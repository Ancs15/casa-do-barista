<?php

namespace App\Providers;

use App\Models\Categoria;
use Illuminate\Support\ServiceProvider;
// use Illuminate\View\View;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Carregar SUBMENU de CATEGORIA
        View::composer('partials.topo', function($view){

            $categoriaMenu = Categoria::query()
            ->where('status_categoria', 'ATIVO')
            ->orderBy('nome_categoria')
            ->get();

            $view->with('categoriaMenu', $categoriaMenu);

        });
    }
}
