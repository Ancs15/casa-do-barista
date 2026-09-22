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
use App\Http\Controllers\Auth\LoginController;


// ROTAS WEB
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

// ROTAS DASHBOARD
/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
|
| O middleware guest permite acessar estas rotas somente quando o usuário NÃO está autenticado.
|
*/

Route::middleware('guest')->group(function () {

    // Exibir tela de login
    Route::get('/login', [LoginController::class, 'index'])
        ->name('login');

    // Processar login
    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.auth');

});


/*
|--------------------------------------------------------------------------
| ÁREA RESTRITA
|--------------------------------------------------------------------------
|
| Todas as rotas deste grupo exigem autenticação.
|
*/

Route::middleware('auth')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [AdminController::class, 'dash'])
        ->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');


    /*
    |--------------------------------------------------------------------------
    | ROTAS ADMINISTRATIVAS
    |--------------------------------------------------------------------------
    */

    Route::prefix('admin')->group(function () {


        /*
        |--------------------------------------------------------------------------
        | CRUD BANNER
        |--------------------------------------------------------------------------
        */

        // Listar banners
        Route::get('/banner', [BannerController::class, 'index'])
            ->name('admin.banner.index');

        // Cadastrar banner
        Route::post('/banner', [BannerController::class, 'store'])
            ->name('admin.banner.store');

        // Editar banner
        // Route::get('/banner/{id}/editar', [BannerController::class, 'edit'])
        //     ->name('admin.banner.edit');

        // Atualizar banner
        Route::put('/banner/{id}', [BannerController::class, 'update'])
            ->name('admin.banner.update');

        // Ativar / desativar banner
        Route::patch('/banner/{id}', [BannerController::class, 'status'])
            ->name('admin.banner.status');


        //CRUD GALERIA
        Route::get('/galeria', [GaleriaController::class, 'index'])->name('admin.galeria.index');
        Route::post('/galeria', [GaleriaController::class, 'store'])->name('admin.galeria.store');
        Route::put('/galeria/{id}', [GaleriaController::class, 'update'])->name('admin.galeria.update');
        Route::patch('/galeria/{id}', [GaleriaController::class, 'status'])->name('admin.galeria.status');


        /*
        |--------------------------------------------------------------------------
        | CRUD PRODUTO
        |--------------------------------------------------------------------------
        */


        //CRUD CATEGORIA
        Route::get('/categorias', [CategoriaController::class, 'index'])->name('admin.categoria.index');
        Route::post('/categorias', [CategoriaController::class, 'store'])->name('admin.categoria.store');
        Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('admin.categoria.update');
        Route::patch('/categorias/{id}', [CategoriaController::class, 'status'])->name('admin.categoria.status');

            //CRUD LINHA DO TEMPO
        Route::get('/linhatempo', [LinhaTempoController::class, 'index'])->name('admin.linhaTempo.index');
        //CRUD NEWSLETTER
        Route::get('/newsletter', [NewsController::class, 'index'])->name('admin.newsletter.index');
        //CRUD CLIENTES
        Route::get('/clientes', [ClienteController::class, 'index'])->name('admin.cliente.index');
        //CRUD DEPOIMENTOS
        Route::get('/depoimentos', [DepoimentoController::class, 'index'])->name('admin.depoimento.index');
        //CRUD VENDAS
        Route::get('/vendas', [VendaController::class, 'index'])->name('admin.venda.index');
        //CRUD PRODUTOS
        Route::get('/produtos', [ProdutoController::class, 'index'])->name('admin.produto.index');

    });

});

