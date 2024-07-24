@extends('layouts.app')
@section('encabezado', 'Crear una lista')
@section('title', 'Crear una lista')

@section('styles')
    <style>
        .error-message{
            background-color:red;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    @@{{ $errors }}
    <form action="{{ route('tasks.store') }}" method="POST">
        <!-- CSRF stands for (C)ross (S)ite (R)equest (F)orquery -->
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"  />
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Long Description:</label>
            <textarea name="long_description" id="long_description" rows="10">{{ old('long_description') }}</textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <input type="submit" value="Crear lista" />
        </div>
    </form>
@endsection