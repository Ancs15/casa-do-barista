<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

Class BannerController extends Controller {

    //Listar banners cadastrados
    public function index() {
        
        //Busca os banners no banco e ordena do maior para o menor por ID
        $listaBanner = Banner::orderByDesc('id_banner')->get();

        //Envia a listagem dos banners pra view
        return view('admin.banner.index', compact('listaBanner'));

    }

    // CADASTRAR BANNER
    public function store(Request $request) {


        // 1 - VALIDAR OS DADOS RECEBIDOS
        $request->validate([
            //Titulo obrigatório, max 50 caracteres
            'titulo_banner' => 'required|max:50',
            //Imagem obrigatória e tem que ser reconhecida como arquivo de imagem
            'imagem_banner' => 'required|image',
            //status é obrigatório
            'status_banner' => 'required'
        ]);

        // 2 - RECEBER A IMAGEM ENVIADA
        //Pega o arquivo do campo imagem_banner e guarda na variável $imagem
        $imagem = $request->file('imagem_banner');
        
        // 3 - CRIAR UM NOME PARA A IMAGEM
        //$titulo = $request->titulo_banner;

        // Converte o título do banner para um formato adequado 
        // para ser usado como nome de arquivo. 
        // Exemplo: "Café Especial do Mês" vira 
        // "cafe-especial-do-mes"
        $titulo = Str::slug($request->titulo_banner);

        // Pega somente o nome original do arquivo, sem a extensão, 
        // e também transforma esse nome em um formato adequado 
        // para ser usado como nome de arquivo.
        $nomeOriginal = Str::slug(pathinfo($imagem->getClientOriginalName(), PATHINFO_FILENAME));

        // Pega somente a extensão original do arquivo.
        $extensao = $imagem->getClientOriginalExtension();

        //$nomeImg = $titulo . '_' . $imagem->getClientOriginalName();

        // Junta o título, o nome original e a extensão 
        // para formar o nome final do arquivo.
        $nomeImg = $titulo . '_' . $nomeOriginal . '.' . $extensao;
        
        // 4 - Salvar a imagem na pasta do projeto
        $imagem->move(public_path('barista/img/banner'), $nomeImg);


        // 5 - Cadastrar no banco de dados
        Banner::create([
            'titulo_banner' => $request->titulo_banner,
            'imagem_banner' => 'banner/' . $nomeImg,
            'status_banner' => $request->status_banner,
        ]);
        
        // 6 - Voltar para a listagem e exibir uma imagem de sucesso ou erro
        return redirect()->route('admin.banner.index')->with('success', 'Banner cadastrado com sucesso!');

    }

}