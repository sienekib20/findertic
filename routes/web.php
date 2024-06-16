<?php

use Sienekib\Proto\Routing\Anotation\Route;


Route::get('/', [App\Http\Controllers\AppController::class, 'index']);
Route::get('/produtos', [App\Http\Controllers\ProdutosController::class, 'index']);
Route::get('/carrinho', [App\Http\Controllers\CarrinhoController::class, 'index']);
