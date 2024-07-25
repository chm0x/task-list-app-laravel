@extends('layouts.app')
@section('title', 'Task List App')

@section('content')
<div>
    <hr />
        <nav class="mb-4 block">
            <a 
                href="{{ route('tasks.create') }}" 
                class="mt-4 font-medium text-center text-white  text-gray-700 w-1/4 rounded block bg-green-500 hover:bg-blue-200" 
            >
                Crear una lista
            </a>
        </nav>
        @if (session()->has('success'))
            <div>
                <p class="mt-2 mb-2 p-1 rounded bg-green-500 text-white w-60">
                    {{ session('success') }}
                </p>
            </div>
        @endif

        @forelse($tasks as $task)
            <div>
                <p>
                    <a 
                        href="{{ route('tasks.show', [ 'task' => $task->id ]) }}"
                        @class(['font-bold','line-through' => $task->completed])
                    >
                        {{ $task->id }} - {{ $task->title }}
                    </a>
                </p>
                <hr />
            </div>
        @empty
            <div>There are no tasks!</div>
        @endforelse

        @if ( $tasks->count() )
            <nav class="mt-4" >
                {{ $tasks->links() }}
            </nav>
        @endif
</div>
@endsection