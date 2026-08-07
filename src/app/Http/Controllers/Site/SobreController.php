<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\LinhaTempo;
use App\Models\Depoimento;

class SobreController extends Controller{

    public function sobre() {

        //Busca os registros da linha do tempo ativos, em ordem crescente por ano
        $listaLinhaTempo = LinhaTempo::where('status_linha_tempo', 'ATIVO')->orderBy('ano_linha_tempo', 'ASC')->get();
        // dd($listaLinhaTempo); // Retorna a variável $listaLinhaTempo para teste

        $listaDepo = Depoimento::with('DepoimentoCliente')
                            ->where('status_depoimento', 'APROVADO')
                            ->orderByDesc('id_depoimento')
                            ->get();

        // dd($listaDepo->toArray());

        return view('site.sobre.sobre', compact('listaLinhaTempo', 'listaDepo'));

    }

}