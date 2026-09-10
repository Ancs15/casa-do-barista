<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

Class BannerController extends Controller {

    //Listar banners cadastrados
    public function index() {
        
        $listaBanner = Banner::orderByDesc('id_banner')->get();

        return view('admin.banner.index', compact('listaBanner'));

    }

    // CADASTRAR BANNER
    public function store(Request $request) {

       dd($request);

        // 1 - Validar os dados recebidos
        $request->validate([
            'titulo_banner' => 'required|max:50',
            'imagem_banner' => 'required|image',
            'status_banner' => 'required'
        ]);

        // 2 - Receber a imagem enviada
        $imagem = $request->file('imagem_banner');
        
        // 3 - Criar um nome para a imagem
        $titulo = $request->titulo_banner;
        $nomeImg = $titulo . '_' . $imagem->getClientOriginalName();
        
        // 4 - Salvar a imagem na pasta do projeto
        $imagem->move(public_path('barista/img/banner'), $nomeImg);


        // 5 - Cadastrar no banco de dados
        Banner::create([
            'titulo_banner' => $request->titulo_banner,
            'imagem_banner' => 'banner/' . $nomeImg,
            'status_banner' => $request->status_banner,
        ]);
        
        // 6 - Voltar para a listagem e exibir uma imagem de sucesso ou erro
        return redirect()->route('admin.banner.index')->with('sucess', 'Banner cadastrado com sucesso!');

    }

}