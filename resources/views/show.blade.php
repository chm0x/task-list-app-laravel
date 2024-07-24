@extends('layouts.app')

@section('title', 'List Detail')
    
@section('content')
    <h2>Title: {{ $task->title }}</h2>
    <hr/>
    @if (session()->has('success'))
      <div style="background-color:green; color:white;" >{{ session('success') }}</div>
    @endif

    <p>Description: {{ $task->description }}</p>

    @if($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>
    <form action="{{ route('tasks.destroy', [ 'task' => $task->id ]) }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit">Delete</button>
    </form>
@endsection