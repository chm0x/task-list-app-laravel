@extends('layouts.app')

@section('title', 'List Detail')
    
@section('content')
    <h2 class="text-2xl mb-4" >Title: {{ $task->title }}</h2>
    <p class="mb-4 mt-2 text-right">
      @if($task->completed)
        <span class="font-medium text-white p-1 rounded bg-green-500">Completed</span>
        @else
        <span class="font-medium text-white p-1 rounded bg-red-500">Not Completed</span>
      @endif
    </p>
    <hr/>
    @if (session()->has('success'))
      <div>
        <p class="mt-2 mb-2 p-1 rounded bg-green-500 text-white w-60">
          {{ session('success') }}
        </p>
      </div>
    @endif

    <p class="mb-4 text-slate-700" >Description: {{ $task->description }}</p>

    @if($task->long_description)
        <p class="mb-4 text-slate-700">Long Description: {{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-sm text-slate-500">Created at: {{ date('d-m-Y', strtotime($task->created_at)) }}, {{ $task->created_at->diffForHumans() }}</p>
    <p class="mb-4 text-sm text-slate-500">Updated at: {{ date('d-m-Y', strtotime($task->updated_at)) }}, {{ $task->updated_at->diffForHumans() }}</p>

    

    <div class="text-center mb-4 ">
      <a 
        href="{{ route('tasks.edit', [ 'task' => $task->id ]) }}"
        class="block p-1 w-full text-white rounded bg-slate-500 hover:bg-slate-100 hover:text-purple-950 hover:border-4 hover:border-solid hover:border-slate-950"
      >
        Edit Form
      </a>
    </div>

    <div>
      <form 
        action="{{ route('tasks.toogle-complete', [ 'task' => $task ]) }}" 
        method="POST"
        class="mt-3 text-center mb-4"
      >
        @csrf
        @method('PUT')
        <button 
          type="submit"
          class="p-1 rounded bg-blue-700 text-white w-full hover:bg-blue-100 hover:text-sky-950 hover:border-4 hover:border-solid hover:border-blue-950 "
        >
          Mark as {{ $task->completed ? 'not completed' : 'completed' }}
        </button>
      </form>
    </div>

    {{-- DELETE BUTTON --}}
    <form action="{{ route('tasks.destroy', [ 'task' => $task->id ]) }}" method="POST">
      @csrf
      @method('DELETE')
      <button 
        type="submit"
        class="p-1 w-full bg-red-900 text-white rounded hover:bg-red-100 hover:text-red-800 hover:border-4 hover:border-solid hover:border-red-950 "
      >
        Delete
      </button>
    </form>
    {{-- END DELETE BUTTON --}}

    <div class="mt-4">
      <a 
        href="{{ route('tasks.index') }}"
        class="font-medium text-gray=700 underline decoration-pink-500"
      >
        &larr; Go back
      </a>
    </div>
@endsection