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

// Rota para usuários logados
Route::middleware('log.acesso', 'autenticacao:padrao, visitante, p3,p4')->prefix('/app')->group(function(){
    Route::get('/home', [\App\Http\Controllers\HomeController::class,'index'])->name('app.home');
    Route::get('/cliente', [\App\Http\Controllers\ClienteController::class,'index'])->name('app.cliente');
    Route::get('/sair', [\App\Http\Controllers\LoginController::class,'sair'])->name('app.sair');

    // Produto
    Route::resource('produto', 'App\Http\Controllers\ProdutoController');

    // Fornecedor
    Route::get('/fornecedor', [\App\Http\Controllers\FornecedorController::class,'index'])->name('app.fornecedor');
    Route::post('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class,'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class,'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class,'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', [\App\Http\Controllers\FornecedorController::class,'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', [\App\Http\Controllers\FornecedorController::class,'excluir'])->name('app.fornecedor.excluir');

});

Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class,'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class,'autenticar'])->name('site.login');