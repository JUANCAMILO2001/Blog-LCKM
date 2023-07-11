@extends('adminlte::page')

@section('title', 'Crear rol - Blog-LCKM')

@section('content_header')
    <h1>Crear rol</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.roles.store')}}" method="post">
            @csrf
            @method('Post')
            <div class="form-group">
                <label for="name_rol">Nombre de su Rol:</label>
                <input type="text" class="form-control form-control-border" id="name_rol" name="name" placeholder="Ingrese el nombre de su rol">
                @error('name')
                <small class="text-danger">
                    {{$message}}
                </small>
                @enderror
            </div>

            <h4>Listado de permisos actuales:</h4>
            <label>Seleccione los permisos que le quiere dar a su rol.</label>
            @foreach($permissions as $permission)
                <div>
                    <div class="form-check">
                        <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->id}}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{$permission->description}}
                        </label>
                    </div>
                </div>
        @endforeach
            <button class="btn mt-3 btn-primary" type="submit">Crear Rol</button>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
