<?php

use App\Http\Controllers\ProdutoController;
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

Route::get('/', function () {
    return view('welcome');
});

// Aparece todos os produtos
Route::get('/produtos', [ProdutoController::class, 'index']);

// Formulário pra criar novo bolo
Route::get('/produtos/criar', [ProdutoController::class, 'create']);

// Salvar o novo bolo no banco
Route::post('/produtos', [ProdutoController::class, 'store']);

// Formulário para editar o bolo
Route::get('/produtos/{produto}/editar', [ProdutoController::class, 'edit']);

// Atualizar os dados do bolo
Route::put('/produtos/{produto}', [ProdutoController::class, 'update']);

// Excluir o bolo
Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy']);
