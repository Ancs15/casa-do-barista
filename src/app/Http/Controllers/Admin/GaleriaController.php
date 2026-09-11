<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeria;

Class GaleriaController extends Controller {

    public function index() {

        $listaGaleria = Galeria::orderByDesc('id_galeria')
                                                   ->get();
        //dd($listaGaleria);

        return view('admin.galeria.index', compact('listaGaleria'));

    }

}