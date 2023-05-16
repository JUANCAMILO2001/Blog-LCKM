@extends('adminlte::page')

@section('title', 'Asignacion Rol - Blog-LCKM')

@section('content_header')
    <h1>Asignar un rol</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre</p>
            <p class="form-control">{{$user->name}}</p>

            <form action="{{route('admin.users.update', $user)}}" method="post">
                @csrf
                @method('PUT')
                <p class="h5">Listado de roles</p>
                @foreach($roles as $role)
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" name="roles[]" type="checkbox" value="{{$role->id}}"   @if(in_array($role->id,$roles_user)) checked @endif id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{$role->name}}
                            </label>
                        </div>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary mt-2">Asignar Role</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
