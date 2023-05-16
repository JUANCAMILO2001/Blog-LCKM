<x-app-layout>
    <div class="section">
        <div class="container">
            <!-- seccion dos -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Posts recientes</h2>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        @if($posts->isNotEmpty())
                            <div class="col-md-12">
                                <div class="post post-thumb">
                                    <a class="post-img" href="{{ route('posts.show', $posts->first()) }}">
                                        <img src="@if($posts->first()->image){{ Storage::url($posts->first()->image->url) }} @else https://c4.wallpaperflare.com/wallpaper/636/671/752/space-astronaut-beer-moon-wallpaper-preview.jpg @endif" alt="">
                                    </a>
                                    <div class="post-body">
                                        <div class="post-meta">
                                            @foreach($posts->first()->tags as $tag)
                                                <a class="post-category cat-3" href="{{ route('posts.tag', $tag) }}">{{ $tag->name }}</a>
                                            @endforeach
                                            <span class="post-date">{{ $posts->first()->created_at->formatLocalized('%B %d, %Y') }}</span>
                                        </div>
                                        <h3 class="post-title"><a href="{{ route('posts.show', $posts->first()) }}">{{ $posts->first()->name }}</a></h3>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @foreach($posts->skip(1) as $key => $post)
                            <div class="col-md-6">
                                <div class="post">
                                    <a class="post-img" href="{{ route('posts.show', $post) }}">
                                        <img src="@if($post->image){{ Storage::url($post->image->url) }} @else https://c4.wallpaperflare.com/wallpaper/636/671/752/space-astronaut-beer-moon-wallpaper-preview.jpg @endif" alt="">
                                    </a>
                                    <div class="post-body">
                                        <div class="post-meta">
                                            @foreach($post->tags as $tag)
                                                <a class="post-category cat-4" href="{{ route('posts.tag', $tag) }}">{{ $tag->name }}</a>
                                            @endforeach
                                            <span class="post-date">{{ $post->created_at->formatLocalized('%B %d, %Y') }}</span>
                                        </div>
                                        <h3 class="post-title"><a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a></h3>
                                    </div>
                                </div>
                            </div>
                            @if(($key + 1) % 2 == 0 && $key != $posts->count() - 1)
                                <div class="clearfix visible-md visible-lg"></div>
                            @endif
                        @endforeach



                    </div>
                    <div>
                        {!! $posts->links() !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>Categorias</h2>
                        </div>
                        <div class="category-widget">
                            <ul>

                                @foreach($categories as $category)
                                <li><a href="{{route('posts.category', $category)}}" class="cat-{{$category->id}}">{{$category->name}}<span><i class="fa fa-reply" aria-hidden="true"></i></span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-app-layout>
