<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;

Class CategoriaController extends Controller {

    public function index() {

        $listaCategorias = Categoria::where('status_categoria', 'ATIVO')
                                           ->orderByDesc('id_categoria')
                                                                ->get();
        //dd($listaCategorias);

        return view('admin.categoria.index', compact('listaCategorias'));

    }

}