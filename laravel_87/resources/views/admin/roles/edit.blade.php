@extends('adminlte::page')

@section('title', 'Editar rol - Blog-LCKM')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="col-12">
                <form action="{{route('admin.roles.update',$role)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nombre-role">Nuevo Nombre de su Rol:</label>
                        <input type="text" class="form-control form-control-border" id="nombre-role" name="name" value="{{$role->name}}">
                    </div>
                    @foreach($permissions as $permission)
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->id}}" @if(in_array($permission->id, $permisos)) checked @endif id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{$permission->description}}
                                </label>
                            </div>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-block bg-gradient-success btn-lg">Editar Estado</button>
                    <a href="{{route('admin.roles.index')}}" class="btn btn-block bg-gradient-danger btn-lg">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
