@extends('adminlte::page')

@section('title', 'listar posts - Blog-LCKM')

@section('content_header')
    <a href="{{route('admin.posts.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo post</a>
    <h1>Listado de posts</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <form class="d-flex" action="{{route('admin.posts.index')}}" method="get">
                <input name="search" class="form-control" placeholder="Ingrese el nombre de un post">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-striped" >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2"></th>
                </tr>
                </thead>
                <tbody>
                @if(count($posts)<=0)
                    <tr>
                        <td class="text-center fw-bold" colspan="4">No hay resultados</td>
                    </tr>
                    <tr>
                        <td class="text-center fw-bold" colspan="4">
                            <a href="{{route('admin.posts.index')}}">Volver atras</a>
                        </td>
                    </tr>
                @else
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit', $post)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.posts.destroy',$post)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="card-footer ">
            <div class="float-right">
                {{$posts->links()}}
            </div>
        </div>
    </div>
@stop

