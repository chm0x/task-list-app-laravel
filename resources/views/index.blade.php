@extends('layouts.app')
@section('title', 'Task List App')

@section('content')
<div>
    <hr />
    @if(count($tasks) > 0)
        @if (session()->has('success'))
            <div style="background-color:green; color:white;">{{ session('success') }}</div>
        @endif
        @foreach($tasks as $task)
            <p><a href="{{ route('tasks.show', [ 'task' => $task->id ]) }}">{{ $task->id }} - Titulo: {{ $task->title }}</a></p>
            <hr />
        @endforeach
    @else
        <p>There are not tasks. </p>
    @endif
</div>
@endsection