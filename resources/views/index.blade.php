@extends('layouts.app')
@section('title', 'Task List App')

@section('content')
    <div>
        <hr/>
        @if(count($tasks) > 0)
            @foreach($tasks as $task)
                <p><a href="{{ route('tasks.show', [ 'id' => $task->id ]) }}">{{ $task->id }} - Titulo: {{ $task->title }}</a></p>
                <hr/>
            @endforeach 
        @else
            <p>There are not tasks. </p>
        @endif    
    </div>
@endsection