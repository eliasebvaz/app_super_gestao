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
Route::get('/', [\App\Http\Controllers\PrincipalController::class,'principal'])
    ->name('site.index')->middleware('log.acesso');

Route::get('/sobrenos', [\App\Http\Controllers\SobreNosController::class,'principal'])->name('site.sobrenos');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class,'salvar'])->name('site.contato');

Route::middleware('log.acesso', 'autenticacao:parametro1, parametro2, parametron')->prefix('app')->group(function(){
    Route::get('/fornecedores', [\App\Http\Controllers\FornecedorController::class,'index'])->name('app.fornecedores');
});

Route::get('/login', [\App\Http\Controllers\LoginController::class,'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class,'autenticar'])->name('site.login');