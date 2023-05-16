@extends('adminlte::page')

@section('title', 'Lista Usuarios - Blog-LCKM')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form class="d-flex" action="{{route('admin.users.index')}}" method="get">
                <input name="search" class="form-control" placeholder="Ingrese el nombre de un post">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>
        @if($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>Email</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.users.edit', $user)}}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    {{$users->links()}}
                </div>
            </div>
        @else
            <div class="card-body">
                <strong class="text-center">No hay registros</strong>
            </div>
        @endif
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
