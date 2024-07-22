<?php

use Illuminate\Http\Response;
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
    ]);
})->name('tasks.index');


// CREATE TASK'S PAGE
// Route::get('/tasks/create', function(){
//     return view('create');
// })->name('tasks.create');
Route::view('/tasks/create', 'create')->name('tasks.create');

Route::post('/tasks/create', function(){
    return 'Lista creada con exito';
})->name('tasks.store');


// DETAIL TASK
Route::get('/tasks/{id}', function($id){
    $task = Task::findOrFail($id);

    return view('show', [ 'task' => $task ] );
})->name('tasks.show');





// If a page doesnt exists, redirect to main page.
Route::fallback(function(){
    return redirect()->route('tasks.index');
});