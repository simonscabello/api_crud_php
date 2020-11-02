<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); 


Route::get('/users',[UserController::class, 'fetchAll']); // Buscar todos usuarios
Route::get('/users/{id}', [UserController::class, 'getUser']); // Buscar um usuario pelo ID
Route::post('/users', [UserController::class, 'createUser']); // Criar um usuario
Route::put('/users/{id}', [UserController::class, 'updateUser']); // Editar um usuario
Route::delete('/users/{id}', [UserController::class, 'deleteUser']); // Deletar Usuario