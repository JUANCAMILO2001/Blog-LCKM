@extends('adminlte::page')

@section('title', 'Crear post - Blog-LCKM')

@section('content_header')
    <h1>Crear un post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                @method('POST')


                <div class="form-group mb-3">
                    <label for="name_posts">Nombre</label>
                    <input type="text" class="form-control" id="name_posts" name="name" placeholder="Ingrese el Nombre del post">

                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="form-group mb-3">
                    <label for="slug_posts">Slug</label>
                    <input readonly type="text" class="form-control" id="slug_posts" name="slug" placeholder="Ingrese el Slug del post">
                    @error('slug')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="category_id">Categoría</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $categoryId => $categoryName)
                            <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                    <br>
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="posts_tags">Etiquetas</label>
                        @foreach($tags as $tag)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tags[]" value="{{$tag->id}}" id="posts-tags">
                                <label class="form-check-label" for="posts-tags">
                                    {{$tag->name}}
                                </label>
                            </div>
                        @endforeach

                    @error('tags')
                    <br>
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">Estado</label>

                    <div class="form-check">
                        <input class="form-check-input" checked value="1" type="radio" name="status" id="stadus_posts_delete">
                        <label class="form-check-label" for="stadus_posts_delete">
                            Borrador
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="2" type="radio" name="status" id="stadus_posts_public">
                        <label class="form-check-label" for="stadus_posts_public">
                            Publicado
                        </label>
                    </div>

                    @error('status')
                    <br>
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="image-wrapper">
                            <img id="picture" src="https://c4.wallpaperflare.com/wallpaper/636/671/752/space-astronaut-beer-moon-wallpaper-preview.jpg" alt="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Imagen que se mostrará en el post</label>
                            <input type="file" id="file" name="file" class="form-control-file" accept="image/*">
                            @error('file')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Asperiores at deserunt fugit, modi necessitatibus nihil non quia, sequi sit,
                                temporibus voluptate voluptatem. Aliquam eaque eos et in officiis,
                                repudiandae voluptatum?
                            </p>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="posts_extract">Extracto</label>
                    <textarea class="form-control" name="extract" id="posts_extract" cols="30" rows="10"></textarea>
                    @error('extract')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="posts_body">Cuerpo del post</label>
                    <textarea class="form-control" name="body" id="posts_body" cols="30" rows="10"></textarea>
                    @error('body')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Crear post</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }


    </style>
@endsection

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
    <script>
        $(document).ready( function() {
            $("#name_posts").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug_posts',
                space: '-'
            });
        });

        ClassicEditor
            .create( document.querySelector( '#posts_extract' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#posts_body' ) )
            .catch( error => {
                console.error( error );
            } );
        //cambiar imagen
        document.getElementById("file").addEventListener('change',cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>
@endsection
