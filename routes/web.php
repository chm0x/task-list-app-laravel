<?php

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Models
use App\Models\Task;

// Redirect to Main Page
Route::get('/', function(){
    return redirect()->route('tasks.index');
});

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


// CREATE TASK'S PAGE
// Route::get('/tasks/create', function(){
//     return view('create');
// })->name('tasks.create');
Route::view('/tasks/create', 'create')->name('tasks.create');

# STORE TASK
Route::post('/tasks/create', function(Request $request){
    // dd($request->all());
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = new Task;

    $task->title            = $data['title'];
    $task->description      = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    if(! $task){
        return 'Something wrong';
    }
    
    return redirect()->route('tasks.show', [ 'id' => $task->id ] );
})->name('tasks.store');

// Update Task
Route::put('/tasks/update/{id}', function($id, Request $request){
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = Task::findOrFail($id);

    $task->title            = $data['title'];
    $task->description      = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    if(! $task){
        return 'Something wrong';
    }
    
    return redirect()->route('tasks.show', [ 'id' => $task->id ] );
})->name('tasks.update');

# EDIT TASK
Route::get('/tasks/{id}/edit', function($id){
    $task = Task::findOrFail($id);

    return view('edit', ['task' => $task]);
})->name('tasks.edit');

// DETAIL TASK
Route::get('/tasks/{id}', function($id){
    $task = Task::findOrFail($id);

    return view('show', [ 'task' => $task ] );
})->name('tasks.show');





// If a page doesnt exists, redirect to main page.
Route::fallback(function(){
    return redirect()->route('tasks.index');
});