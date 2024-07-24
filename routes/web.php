<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Models
use App\Models\Task;

// Redirect to Main Page
Route::get('/', function(){
    return redirect()->route('tasks.index');
});

# -------------------------------------------------------------------
// Main Page
Route::get('/tasks', function(){
    $tasks = Task::latest()->get();
    // $tasks = Task::latest()->where('completed', true)->get();
    // $tasks = Task::all();

    return view('index', [
        'tasks' => $tasks
    ])
    ->with('success', 'Task created successful');
})->name('tasks.index');


# -------------------------------------------------------------------
// CREATE TASK'S PAGE
// Route::get('/tasks/create', function(){
//     return view('create');
// })->name('tasks.create');
Route::view('/tasks/create', 'create')->name('tasks.create');

# -------------------------------------------------------------------
# STORE TASK
Route::post('/tasks/create', function(TaskRequest $request){
    // $data = $request->validated();

    // $task = new Task;

    // $task->title            = $data['title'];
    // $task->description      = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();

    $task = Task::create($request->validated());

    if(! $task){
        return 'Something wrong';
    }
    
    return redirect()->route('tasks.show', [ 'id' => $task->id ] );
})->name('tasks.store');


# -------------------------------------------------------------------
# UPDATE TASK
Route::put('/tasks/update/{task}', function(Task $task, TaskRequest $request){
    
    $task->update($request->validated());

    if(! $task){
        return 'Something wrong';
    }
    return redirect()->route('tasks.show', [ 'task' => $task->id ] )
            ->with('success', 'Task Updated Successfully');

})->name('tasks.update');


# -------------------------------------------------------------------
# EDIT TASK
Route::get('/tasks/{task}/edit', function(Task $task){

    return view('edit', ['task' => $task ]);

})->name('tasks.edit');

# -------------------------------------------------------------------
// DETAIL TASK
Route::get('/tasks/{task}', function(Task $task){
    // $task = Task::findOrFail($id);

    return view('show', [ 'task' => $task ] );
})->name('tasks.show');





// If a page doesnt exists, redirect to main page.
// Route::fallback(function(){
//     return redirect()->route('tasks.index');
// });