<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Venda;

Class VendaController extends Controller {

    public function index() {

        $listaVendas = Venda::with('VendaCliente')
             ->where('status_venda', 'FINALIZADA')
                         ->orderByDesc('id_venda')
                                          ->get();
        //dd($listaVendas->toArray());

        return view('admin.venda.index', compact('listaVendas'));
    }

}