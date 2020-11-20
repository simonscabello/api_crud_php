<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts/index');
});

Route::get('/cadastro', function () {
    return view('layouts/cadastro');
});

Route::get('/lista', function () {
    return view('layouts/lista');
});


Route::get('/lista', [UserController::class, 'fetchAll'])->name('lista');
Route::get('/user/{id}', [UserController::class, 'getUserById']);
Route::post('/cadastro', [UserController::class, 'createUser']); // Criar um usuario
Route::put('/{id}', [UserController::class, 'updateUser']);
Route::delete('/user/delete/{id}', [UserController::class, 'deleteUser']);
