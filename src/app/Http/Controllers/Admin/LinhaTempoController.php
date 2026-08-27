<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LinhaTempo;

Class LinhaTempoController extends Controller {

    public function index() {

        $listaLinhaTempo = LinhaTempo::where('status_linha_tempo', 'ATIVO')
                                            ->orderByDesc('id_linha_tempo')
                                                                    ->get();

        return view('admin.linhaTempo.index', compact('listaLinhaTempo'));

    }

}