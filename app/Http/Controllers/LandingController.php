<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactUsMail;
use App\Models\Model\BlogModel;
use App\Models\Model\ProductModel;
use Illuminate\Support\Facades\Mail;

class LandingController extends Controller
{
    private $product;

    private $blog;

    /**
     * Class constructor.
     */
    public function __construct(
        ProductModel $productModel,
        BlogModel $blogModel
    ) {
        $this->product = $productModel;
        $this->blog = $blogModel;
    }

    public function index()
    {
        $products = $this->product->getOnly(['name', 'slug_name', 'thumbnail']);
        $blogs = $this->blog->getBlogs(5);
        $populars = $this->blog->getPopulars(5);
        return view('pages._compro.index', compact('products', 'blogs', 'populars'));
    }

    public function aboutUs()
    {
        return view('pages._compro.about-us');
    }

    public function product()
    {
        return view('pages._compro.about-us');
    }

    public function article()
    {
        $blogs = $this->blog->getBlogs(10);
        $populars = $this->blog->getPopulars(5);
        return view('pages.article', compact('blogs', 'populars'));
    }

    public function showArticle($slug)
    {
        $article = $this->blog->findBySlug($slug);
        if ($article) {
            $tags = $tags = explode(',', $article->tags);
            $relates = $this->blog->findRelatedBlog($tags);
            return view('pages.showArticle', compact('article', 'tags', 'relates'));
        }
        return abort(404);
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function contactUs()
    {
        return view('pages.contact');
    }

    public function sendMail(ContactUsRequest $request)
    {
        if ($request->ajax()) {
            Mail::to(env('MAIL_FROM_NAME', 'info@mayaspringbed.id'))
                ->queue(new ContactUsMail(
                    $request->name,
                    $request->email,
                    $request->subject,
                    $request->message
                ));
        }

        if (Mail::failures()) {
            return response()->json(['message' => 'email couldn\'t be sent'], 422);
        } else {
            return response()->json(['message' => 'success'], 200);
        }
    }
}