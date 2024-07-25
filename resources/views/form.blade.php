@extends('layouts.app')

<!-- Head Title -->
@section('encabezado', isset($task) ? 'Edit Task' : 'Add Task')
<!-- H1 Title -->
@section('title', isset($task) ? 'Edit Task' : 'Add Task')

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
            <label for="title" class="uppercase text-slate-700 text-xs" >Title:</label>
            <input type="text" name="title" id="title" 
                value="{{ $task->title ??  old('title') }}"  
                class="shadow-sm apperance-none border w-full"
            />
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description" class="uppercase text-slate-700 text-xs">Description:</label>
            <textarea name="description" id="description"
                      class="shadow-sm apperance-none border w-full"
            >
                {{ $task->description ?? old('description') }}
            </textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description" class="uppercase text-slate-700 text-xs">Long Description:</label>
            <textarea 
                    name="long_description" 
                    id="long_description" 
                    rows="10"
                    class="shadow-sm apperance-none border w-full"
            >
                {{ $task->long_description ?? old('long_description') }}
            </textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <input type="submit" 
                    value="{{ isset($task) ? 'Actualizar' : 'Crear' }}" 
                    class="mt-4 block p-1 rounded w-full bg-green-500 text-white"
            />
        </div>
    </form>
    <div class="mt-4">
        <a 
            href="{{ route('tasks.index') }}"
            class="font-medium text-gray=700 underline decoration-pink-500"
        >
            &larr; Go back
        </a>
    </div>
@endsection