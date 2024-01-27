<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

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

Route::get('/tasks', [TasksController::class, 'index']);
// function () {
//     return view('tasks.index');
// }

Route::get('/tasks/create',  [TasksController::class, 'create']);

Route::get('/',  [TasksController::class, 'index']);

Route::post('/tasks',  [TasksController::class, 'store']);

Route::patch('/tasks/{id}', [TasksController::class, 'update']);

Route::delete('/tasks/{id}', [TasksController::class, 'delete']);

Route::get('/tasks/{id}', [TasksController::class, 'delete']);

