<?php

use App\Http\Controllers\Site\CardapioController;
use App\Http\Controllers\Site\ContatoController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\DepoimentoController;
use App\Http\Controllers\Admin\GaleriaController;
use App\Http\Controllers\Admin\LinhaTempoController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProdutoController;
use App\Http\Controllers\Admin\VendaController;
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

//Conecta a rota Dash com o controller AdminControler e o método dash
Route::get('/dashboard', [AdminController::class, 'dash'])->name('dash');

//Conecta as rotas CMS com seus respectivos controles e métodos
Route::get('/admin/banners', [BannerController::class, 'index'])->name('admin.banner.index');
Route::get('/admin/categorias', [CategoriaController::class, 'index'])->name('admin.categoria.index');
Route::get('/admin/galeria', [GaleriaController::class, 'index'])->name('admin.galeria.index');
Route::get('/admin/linhatempo', [LinhaTempoController::class, 'index'])->name('admin.linhaTempo.index');
Route::get('/admin/newsletter', [NewsController::class, 'index'])->name('admin.newsletter.index');
Route::get('/admin/clientes', [ClienteController::class, 'index'])->name('admin.cliente.index');
Route::get('/admin/depoimentos', [DepoimentoController::class, 'index'])->name('admin.depoimento.index');
Route::get('/admin/vendas', [VendaController::class, 'index'])->name('admin.venda.index');
Route::get('/admin/produtos', [ProdutoController::class, 'index'])->name('admin.produto.index');