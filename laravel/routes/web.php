<?php

use App\Http\Controllers\ControllerFilme;
use App\Http\Controllers\ControllerUser;
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


Route::get('/', [ControllerUser::class, 'login']);
Route::post('/', [ControllerUser::class, 'login']);
Route::get('/login', [ControllerUser::class, 'login'])->name('login');
Route::post('/login', [ControllerUser::class, 'login']);
Route::get('/logout', [ControllerUser::class, 'logout'])->name('logout');

// Usuário Autenticado
Route::middleware('auth')->group(function (){
Route::get('/addUser', [ControllerUser::class, 'createUser'])->name('create.user');
Route::get('/filmes', [ControllerFilme::class, 'index'])->name('filmes.index');
Route::get('/filmes/{id}', [ControllerFilme::class, 'show'])->name('filmes.show');
//Route::post('/addUser', [ControllerUsuario::class, 'createUser']);
});

// Admin Autenticado
Route::middleware('isAdmin')->group(function (){
Route::get('/users', [ControllerUser::class, 'index'])->name('users');
Route::get('/userEdit/{id}', [ControllerUser::class, 'userEdit'])->name('users.edit');
Route::put('/userUpdate/{id}', [ControllerUser::class, 'userUpdate'])->name('users.update');
Route::get('/userDelete/{id}', [ControllerUser::class, 'destroy'])->name('users.delete');
Route::get('/users/promote/{id}', [ControllerUser::class, 'promote'])->name('users.promote');
});
