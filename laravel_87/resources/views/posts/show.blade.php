<x-app-layout>


    <div id="post-header" class="page-header">
        @if($post->image)
        <div class="background-img" style="background-image: url('{{Storage::url($post->image->url)}}');"></div>
        @else
            <div class="background-img" style="background-image: url('https://c4.wallpaperflare.com/wallpaper/636/671/752/space-astronaut-beer-moon-wallpaper-preview.jpg');"></div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-meta">
                        @foreach($post->tags as $tag)
                        <a class="post-category cat-2" href="{{route('posts.tag', $tag )}}">{{$tag->name}}</a>
                        @endforeach
                        <span class="post-date">{{$post->created_at->formatLocalized('%B %d, %Y')}}</span>
                    </div>
                    <h1>{{$post->name}}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section">

        <div class="container">

            <div class="row">

                <div class="col-md-8">
                    <div class="section-row sticky-container">
                        <div class="main-post">
                            <h3 class="mb-5">{{$post->name}}</h3>
                            <p class="mt-4">{!! $post->extract !!} </p>
                            <p class="mt-4">{!! $post->body !!}</p>
                            </div>
                        <div class="post-shares sticky-shares" style="margin-left: -50px">
                            <a href="#" class="share-facebook"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#" class="share-twitter"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" class="share-google-plus"><i class="fa-brands fa-google"></i></a>
                            <a href="#" class="share-linkedin"><i class="fa-brands fa-linkedin"></i></a>

                        </div>
                    </div>




                    <div class="section-row">
                        <div class="post-author">
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="https://preview.colorlib.com/theme/webmag/img/author.png.webp" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h3>Autor del post: {{$post->user->name}}</h3>

                                    </div>
                                    <ul class="author-social">
                                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-google"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>


                <div class="col-md-4">




                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>Más en {{$post->category->name}}</h2>
                        </div>
                        @foreach($similares as $similar)
                        <div class="post post-widget">
                            <a class="post-img" href="{{route('posts.show',$similar)}}">
                                @if($similar->image)
                                <img src="{{Storage::url($similar->image->url)}}" alt="">
                                @else
                                    <img class="mas-img-post" src="https://c4.wallpaperflare.com/wallpaper/636/671/752/space-astronaut-beer-moon-wallpaper-preview.jpg" alt="">
                                @endif
                            </a>
                            <div class="post-body">
                                <h3 class="post-title"><a href="{{route('posts.show',$similar)}}">{{$similar->name}}</a></h3>
                            </div>
                        </div>
                        @endforeach
                    </div>

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


                    <div class="aside-widget">
                        <div class="tags-widget">
                            <ul>

                                @foreach($tags as $tag)
                                <li><a href="{{route('posts.tag', $tag )}}">{{$tag->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                </div>

            </div>

        </div>

    </div>
</x-app-layout>
