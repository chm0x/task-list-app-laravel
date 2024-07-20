@extends('layouts.app')
@section('title', 'Task List App')

@section('content')
    <div>
        <hr/>
        @if(count($tasks) > 0)
            @foreach($tasks as $task)
                <p><a href="{{ route('tasks.show', [ 'id' => $task->id ]) }}" style="color:blue;">Titulo: {{ $task->title }}</a></p>
                <p>Description: {{ $task->description }}</p>
                <hr/>
            @endforeach 
        @else
            <p>There are not tasks. </p>
        @endif    
    </div>
@endsection