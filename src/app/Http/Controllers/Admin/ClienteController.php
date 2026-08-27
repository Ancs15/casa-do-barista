<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;

Class ClienteController extends Controller {

    public function index() {

        $listaClientes = Cliente::where('status_cliente', 'ATIVO')
                                       ->orderByDesc('id_cliente')
                                                          ->get();
        //dd($listaClientes);

        return view('admin.cliente.index', compact('listaClientes'));

    }

}