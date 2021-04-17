<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class MediaController extends Controller
{
    public function getItemImage($imageName)
    {
        $path = storage_path('app/public/images/items/' . $imageName);
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $response = Response::make($file, 200);
        $response->header('Content-Type', 'images');
        return $response;
    }

    public function getCustomerImage($imageName)
    {
        $path = storage_path('app/public/images/customers/' . $imageName);
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $response = Response::make($file, 200);
        $response->header('Content-Type', 'images');
        return $response;
    }
}