<?php

use App\Http\Controllers\ControllerFilme;
use App\Http\Controllers\ControllerUsuario;
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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/teste', [ControllerFilme::class, 'allFilmes'])->name('teste');

Route::get('/addUser', [ControllerUsuario::class, 'createUser'])->name('create.user');
//Route::post('/addUser', [ControllerUsuario::class, 'createUser']);