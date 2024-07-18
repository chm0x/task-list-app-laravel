<h1>Hello World!</h1>
<p>List of Task</p>
<div>
    <hr/>
    @if(count($tasks) > 0)
        @foreach($tasks as $task)
            <p>Titulo: {{ $task->title }}</p>
            <p>Description: {{ $task->description }}</p>
            <hr/>
        @endforeach 
    @else
        <p>There are not tasks. </p>
    @endif    
</div>