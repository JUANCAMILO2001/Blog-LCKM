@extends('adminlte::page')

@section('title', 'Listar Categoria - Blog-LCKM')

@section('content_header')
    @can('admin.categories.create')
        <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.categories.create')}}">Agregar Categoría</a>
    @endcan
    <h1>Listar Categoría</h1>
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
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            @can('admin.categories.edit')
                            <td width="10px"><a href="{{route('admin.categories.edit',$category)}}" class="btn btn-primary btn-sm">Editar</a></td>
                            @endcan
                            @can('admin.categories.destroy')
                            <td width="10px">
                                <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
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

    </div>
@stop


