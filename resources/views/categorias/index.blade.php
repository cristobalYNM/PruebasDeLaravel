@extends('layouts.plantilla')
@section('contenido')
<h1>Listado de categorias</h1>
<hr>
<div class="d-md-flex justify-content-md-end">
    <form action="{{ route('categorias.index') }}" method="GET">
        <div class="btn-group">
            <input type="text" name="busqueda" class="form-control">
            <input type="submit" name="enviar" class="btn btn-primary">
        </div>

    </form>
</div>
<div>
    <a href="{{ route('categorias.create') }}" class="btn btn-primary">Agregar</a>
</div>
<table class="table">
    <thead>
        <td>ID</td>
        <td>CODIGO</td>
        <td>NOMBRE</td>
        <td>OPCION</td>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <td>{{ $categoria->id }}</td>
            <td>{{ $categoria->codigo }}</td>
            <td>{{ $categoria->nombre }}</td>
            <td class="btn-group">
                <a class="btn btn-primary" href="{{ route('categorias.show',$categoria->id)}}">+</a>
                <a class="btn btn-warning" href="{{ route('categorias.edit',$categoria->id)}}">Editar</a>

                <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger" type="submit" value="Eliminar">
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4">{{$categorias->appends(['busqueda=>$busqueda'])}}</td>
        </tr>
    </tfoot>
</table>
@endsection