@extends('layouts.app')

<!-- Head Title -->
@section('encabezado', isset($task) ? 'Edit Task' : 'Add')
<!-- H1 Title -->
@section('title', isset($task) ? 'Edit Task' : 'Add')

@section('styles')
    <style>
        .error-message{
            background-color:red;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <form 
        action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" 
        method="POST"
    >
        <!-- CSRF stands for (C)ross (S)ite (R)equest (F)orquery -->
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" 
                value="{{ $task->title ??  old('title') }}"  
            />
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Long Description:</label>
            <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <input type="submit" value="{{ isset($task) ? 'Actualizar' : 'Crear' }}" />
        </div>
    </form>
@endsection