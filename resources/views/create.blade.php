@extends('layouts.app')
@section('encabezado', 'Crear una lista')
@section('title', 'Crear una lista')

@section('content')
    <form action="{{ route('tasks.store') }}" method="POST">
        <!-- CSRF stands for (C)ross (S)ite (R)equest (F)orquery -->
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name"  />

        <input type="submit" value="Guardar la lista" />
    </form>
@endsection