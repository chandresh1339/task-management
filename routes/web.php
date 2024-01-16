<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Routes in detail
Route::resource('tasks',TaskController::class);
//Index routes
Route::get('/tasks', function () {
    return view('index');
});
//Create and Store Routes
Route::get('/tasks/create', [TaskController::class,'create'])->name('tasks.create');
Route::post('/tasks/store', [TaskController::class,'store'])->name('tasks.store');

//Display the specified routes in task
Route::get('/tasks/{$task}', [TaskController::class,'show'])->name('tasks.show');
//Edit the specified routes in task
Route::get('/tasks/{$task}/edit', [TaskController::class,'edit'])->name('tasks.edit');
//Update the specified routes in task
Route::put('/tasks/{$task}', [TaskController::class,'update'])->name('tasks.update');

Route::post('tasks/update-order', [TaskController::class, 'updateOrder'])->name('tasks.updateOrder');
//Remove the specified routes in task
Route::delete('/tasks/{$task}', [TaskController::class,'destroy'])->name('tasks.delete');