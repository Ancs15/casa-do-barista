<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produto;

Class ProdutoController extends Controller {

    public function index() {

        $listaProdutos = Produto::with('ProdutoCategoria')
                        ->where('status_produto', 'ATIVO')
                               ->orderByDesc('id_produto')
                                                  ->get();
        //dd($listaProdutos->toArray());

        return view('admin.produto.index', compact('listaProdutos'));

    }

}