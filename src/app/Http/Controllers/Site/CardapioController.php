<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Galeria;

class CardapioController extends Controller{

    public function cardapio(?int $idCategoria = null){

        $listaCategorias = Categoria::where('status_categoria', 'ATIVO')
        ->orderBy('nome_categoria')
        ->get();

        // dd($listaCategorias);

        // SE nenhuma categoria estiver na URL
        if($idCategoria === null){
            $categoriaSelecionada = $listaCategorias->first();
        } else{
            $categoriaSelecionada = $listaCategorias->firstWhere('id_categoria', $idCategoria);
        }

        //Caso não tenha a categoria
        abort_if($categoriaSelecionada === null, 404, 'Categoria não encontrada');

        // Buscar somente os produtos relacionados à categoria
        $listaProdutos = Produto::where('status_produto', 'ATIVO')
        ->orderBy('nome_produto')
        ->get();

        $produtos = Produto::query()
        ->where('id_categoria', $categoriaSelecionada->id_categoria)
        ->where('status_produto', 'ATIVO')
        ->orderBy('nome_produto')
        ->get();

        // dd($produtos);

        // dd($listaProdutos);


        //Buscar as imagens de galeria ativas em ordem aleatória no banco e armazena na variável $listaGaleria
        $listaGaleria = Galeria::where('status_galeria', 'ATIVO')->inRandomOrder()->get();

        // dd($listaGaleria);
    
        return view('site.cardapio.cardapio', compact('listaCategorias', 'listaProdutos', 'produtos', 'categoriaSelecionada', 'listaGaleria'));

    }

}