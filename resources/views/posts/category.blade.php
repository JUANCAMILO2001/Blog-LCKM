<x-app-layout>
    <div class="container mt-4">
        <h1 class="text-uppercase text-center fs-2 fw-bold">Categoría: {{$category->name}}</h1>
        @foreach($posts as $post)
            <div class="shadow pb-5  mb-3 bg-body-tertiary rounded">
                <img class="img-fluid posts-img-category-show" src="{{Storage::url($post->image->url)}}" alt="">
                <div class="container">
                    <div >
                        <h1 class="mt-2 fw-bold fs-4"><a href="{{route('posts.show', $post)}}">{{$post->name}}</a></h1>
                        <div class="mt-2">
                            {{$post->extract}}
                        </div>

                    </div>
                    <div class="mt-2">
                        @foreach($post->tags as $tag)
                            <a href="{{route('posts.tag', $tag)}}" class="fs-5 text-decoration-none "><span class="float-start badge text-bg-{{$tag->color}} me-1">{{$tag->name}}</span></a>
                        @endforeach
                    </div>
                </div>

            </div>
        @endforeach
        <div>
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>
