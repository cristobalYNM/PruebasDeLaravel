@extends('layouts.plantilla')
@section('contenido')
    <label for="{{ $categoria->id }}"></label>
    <label for="{{ $categoria->codigo }}"></label>
    <label for="{{ $categoria->nombre }}"></label>
@endsection
