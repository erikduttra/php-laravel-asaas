<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PagamentoController;


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

Route::get('admin/produto', [ProdutoController::class, 'index']);
Route::get('admin/produto/create', [ProdutoController::class, 'create']);
Route::post('admin/produto', [ProdutoController::class, 'store']);
Route::get('admin/produto/{id}/edit', [ProdutoController::class, 'edit']);
Route::put('admin/produto/{id}', [ProdutoController::class, 'update']);
Route::delete('admin/produto/{id}', [ProdutoController::class, 'destroy']);

Route::get('produto/compra', [ProdutoController::class, 'compra']);

Route::get('pagamento/{id}', [PagamentoController::class, 'index']);
Route::post('pagamento/concluir', [PagamentoController::class, 'concluir']);
