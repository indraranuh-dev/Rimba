@if ($blog->total() !== 0)
<section class="section">
    <div class="container">
        <div class="row">

            @if (request()->routeIs('index'))
            <div class="col-12 text-center">
                <h2 class="section-title">Artikel</h2>
            </div>
            @endif
            @foreach ($blog as $blog)
            <div class="col-lg-4 col-sm-6 mb-4">
                <article class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a class="text-dark" href="{{route('showArticle', $blog->slug_title)}}">
                                {{$blog->title}}
                            </a>
                        </h4>
                        <small class="ml-auto">{{ $blog->created_at->diffForHumans()}}</small>
                        <p class="cars-text">
                            {{$blog->subject}}
                        </p>
                        <a href="{{route('showArticle', $blog->slug_title)}}" class="btn btn-xs btn-primary">Read
                            More</a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
</section>
@endif