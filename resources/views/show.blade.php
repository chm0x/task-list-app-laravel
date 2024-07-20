@extends('layouts.app')

@section('title', 'List Detail')
    
@section('content')
    <h2>List Detail: $task->title</h2>
    <hr/>

    <p>Description: {{ $task->description }}</p>

    @if($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>
@endsection