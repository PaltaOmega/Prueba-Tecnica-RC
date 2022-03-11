<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Route::resource('usuario', 'UserController');

Route::resource('usuario', UserController::class)->middleware('auth');

Route::resource('documentos', 'DocumentController');

Route::resource('documentos', DocumentController::class)->middleware('auth');

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/home', [UserController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/', [UserController::class, 'index'])->name('home');
});

Route::get('/documentos', [DocumentController::class, 'index'])->name('ver');

Route::post('/registro_documentos', [DocumentController::class, 'store']);

Route::get('/navbar', [MenuController::class, 'index']);

Route::get('/descarga/{id}', [DocumentController::class, 'descarga'])->name('descargar');
