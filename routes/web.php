<?php

use Illuminate\Support\Facades\Route;

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

// Rota principal
Route::get('/', [\App\Http\Controllers\PrincipalController::class,'principal'])->name('site.index');

Route::get('/sobrenos', [\App\Http\Controllers\SobreNosController::class,'principal'])->name('site.sobrenos');

Route::get('/contato', [\App\Http\Controllers\ContatoController::class,'principal'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class,'principal'])->name('site.contato');
