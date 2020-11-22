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
    return view('index');
});

Route::get('/createusers', function () {
    return view('createusers');
});

Route::get('/listusers', function () {
    return view('listusers');
});


Route::get('/listusers', [UserController::class, 'fetchAll'])->name('listusers');
Route::get('/user/{id}', [UserController::class, 'getUserById']);
Route::get('/user/delete/{id}', [UserController::class, 'deleteUser']);
Route::post('/createusers', [UserController::class, 'createUser']);
Route::put('/{id}', [UserController::class, 'updateUser']);