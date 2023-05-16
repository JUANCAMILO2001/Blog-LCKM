@extends('adminlte::page')

@section('title', 'Editar Categoria - Blog-LCKM')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.categories.update', $category)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name_categories">Nombre</label>
                    <input type="text" class="form-control" id="name_categories" name="name" value="{{$category->name}}" placeholder="Ingrese el Nombre de la Categoría">

                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="form-group mb-3">
                    <label for="slug_categories">Slug</label>
                    <input readonly type="text" class="form-control" id="slug_categories" name="slug" value="{{$category->slug}}" placeholder="Ingrese el Slug de la Categoría">
                    @error('slug')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Categoría</button>

            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready( function() {
            $("#name_categories").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug_categories',
                space: '-'
            });
        });
    </script>
@endsection
