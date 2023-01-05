@extends('layouts.plantilla')
@section('contenido')
    
    <form action="{{route('categorias.store')}}" method="POST">
        @csrf
        <div>
            <label for="">Codigo</label>
            <input type="text" name="codigo" class="form-control">
        </div>
        <div>
            <label for="">Nombre</label>
            <input type="text" name="nombre" class="form-control">
        </div>
        <div>
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
    </form>

@endsection
