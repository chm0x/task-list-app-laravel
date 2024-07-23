@extends('layouts.app')
@section('encabezado', 'Crear una lista')
@section('title', 'Crear una lista')

@section('content')
    {{ $errors }}
    <form action="{{ route('tasks.store') }}" method="POST">
        <!-- CSRF stands for (C)ross (S)ite (R)equest (F)orquery -->
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title"  />
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <div>
            <label for="long_description">Long Description:</label>
            <textarea name="long_description" id="long_description" rows="10"></textarea>
        </div>
        <div>
            <input type="submit" value="Crear lista" />
        </div>
    </form>
@endsection