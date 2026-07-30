<?php

use App\Http\Controllers\Site\CardapioController;
use App\Http\Controllers\Site\ContatoController;
use App\Http\Controllers\Site\EventosController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\SobreController;
use Illuminate\Support\Facades\Route;


//Conecta a rota da home com o controller HomeController e o método home
Route::get('/', [HomeController::class, 'home'])->name('home');

//Conecta a rota da sobre com o controller SobreController e o método sobre
Route::get('/sobre', [SobreController::class, 'sobre'])->name('sobre');

//Conecta a rota do Cardápio com o controller CardapioControler e o método cardapio
Route::get('/cardapio', [CardapioController::class, 'cardapio'])->name('cardapio');

    //Conecta a rota do Submenu Categoria com o controller CardapioController e o método cardapio
    Route::get('/cardapio/categoria/{idCategoria}', [CardapioController::class, 'cardapio'])->name('cardapio.categoria');

//Conecta a rota dos Eventos com o controller EventosController e o método eventos
Route::get('/eventos', [EventosController::class, 'eventos'])->name('eventos');

//Conecta a rota Contato com o controller ContatoController e o método contato
Route::get('/contato', [ContatoController::class, 'contato'])->name('contato');