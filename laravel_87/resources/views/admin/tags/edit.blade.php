@extends('adminlte::page')

@section('title', 'Editar Etiqueta - Blog-LCKM')

@section('content_header')
    <h1>Editar Etiqueta</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.tags.update',$tag)}}"  method="post">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name_tags">Nombre</label>
                    <input type="text" class="form-control" id="name_tags" name="name" value="{{$tag->name}}" placeholder="Ingrese el Nombre de la etiqueta">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="slug_tags">Slug</label>
                    <input readonly type="text" class="form-control" id="slug_tags" name="slug" value="{{$tag->slug}}" placeholder="Ingrese el Slug de la etiqueta">
                    @error('slug')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <!--tambien se puede hacer de forma manual-->
                    {!! Form::label('color', 'Color') !!}
                    {!! Form::select('color', $colors, null,['class' => 'form-control']) !!}


                    @error('color')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-warning">Editar Etiqueta</button>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready( function() {
            $("#name_tags").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug_tags',
                space: '-'
            });
        });
    </script>
@endsection

