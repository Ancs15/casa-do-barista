<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Depoimento;

Class DepoimentoController extends Controller {

    public function index() {

        $listaDepo = Depoimento::with('DepoimentoCliente')
                            ->where('status_depoimento', 'APROVADO')
                            ->orderByDesc('id_depoimento')
                            ->get();
        //dd($listaDepo->toArray());

        return view('admin.depoimento.index', compact('listaDepo'));
    }
 
}