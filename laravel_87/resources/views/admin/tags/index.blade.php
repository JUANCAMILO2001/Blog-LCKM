@extends('adminlte::page')

@section('title', 'Listar Etiquetas - Blog-LCKM')

@section('content_header')
    @can('admin.tags.create')
        <a href="{{route('admin.tags.create')}}" class="btn btn-secondary btn-sm float-right">Nueva etiqueta</a>
    @endcan
    <h1>Listado de Etiquetas</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->name}}</td>
                        @can('admin.tags.edit')
                        <td width="10px">
                            <a href="{{route('admin.tags.edit', $tag)}}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        @endcan
                        @can('admin.tags.destroy')
                        <td width="10px">
                            <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>

                            </form>
                        </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
        <div class="card-footer">
            <div class="float-right">
                {{$tags->links()}}
            </div>

        </div>
    </div>
@stop

