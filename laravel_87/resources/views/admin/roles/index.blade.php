@extends('adminlte::page')

@section('title', 'Lista de rol - Blog-LCKM')

@section('content_header')
    <a href="{{route('admin.roles.create')}}" class="btn btn-sm btn-secondary float-right">Nuevo rol</a>
    <h1>Lista de roles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Rol</th>
                    <th colspan="2"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td><a href="{{route('admin.roles.edit',$role)}}" class="btn btn-sm btn-primary">Editar</a></td>
                        <td>
                            <form action="{{route('admin.roles.destroy',$role)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
