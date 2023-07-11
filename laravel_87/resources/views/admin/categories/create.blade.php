@extends('adminlte::page')

@section('title', 'Crear Categoria - Blog-LCKM')

@section('content_header')
    <h1>Crear nueva Categoría</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.categories.store')}}" method="post">
            @csrf
            @method('POST')
            <div class="form-group mb-3">
                <label for="name_categories">Nombre</label>
                <input type="text" class="form-control" id="name_categories" name="name" placeholder="Ingrese el Nombre de la Categoría">

                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror

            </div>
            <div class="form-group mb-3">
                <label for="slug_categories">Slug</label>
                <input readonly type="text" class="form-control" id="slug_categories" name="slug" placeholder="Ingrese el Slug de la Categoría">
                @error('slug')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Crear Categoría</button>

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

