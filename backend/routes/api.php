<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('todos', [TodoController::class,'getTodo']);
Route::get('todos/{id}', [TodoController::class,'GetTodoId']);
Route::post('addTodo', [TodoController::class,'addTodo']);
Route::put('updateTodo/{id}', [TodoController::class,'updateTodo']);
Route::delete('deleteTodo/{id}', [TodoController::class,'deleteTodo']);