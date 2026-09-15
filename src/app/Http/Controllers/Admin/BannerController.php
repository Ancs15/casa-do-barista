<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $dados = $request->validate([
            //Titulo obrigatório, max 50 caracteres
            'titulo_banner' => 'required|max:50',
            //Imagem obrigatória e tem que ser reconhecida como arquivo de imagem
            'imagem_banner' => 'required|image|mimes:jpg,png,webp,jpeg|max:4096',
            //status é obrigatório
            'status_banner' => 'required|in:ATIVO,INATIVO'
        ]);

        $caminhoArquivo = null;

        try{

            DB::beginTransaction();

            // 2 - Cadastrar no banco de dados
            $banner = Banner::create([
                'titulo_banner' => $dados['titulo_banner'],
                // Valor temporário
                'imagem_banner' => 'banner/sem-foto.png',
                'status_banner' => $dados['status_banner']
            ]);
            
            // 3 - RECEBER A IMAGEM ENVIADA
            //Pega o arquivo do campo imagem_banner e guarda na variável $imagem
            $imagem = $request->file('imagem_banner');
            
            // 4 - CRIAR UM NOME PARA A IMAGEM
            // Café Mineiro => cafe_mineiro_7.png
            $tituloImg = Str::slug($dados['titulo_banner']);

            // 5 - Pegar a extensão do arquivo
            $extensao = strtolower($imagem->getClientOriginalExtension());

            // 6 - Criar nome FINAL
            $nomeImg = $tituloImg . '_' . $banner->id_banner . '.' . $extensao;
            
            // 7 - Salvar a imagem na pasta do projeto
            $pasta = public_path('barista/img/banner');

            // 8 - Criar a pasta SE a pasta NÃO EXISTIR
            if(!is_dir($pasta)){
                mkdir($pasta, 0775, true);
            }
            
            // 9 - Mover e salvar a imagem na pasta
            $imagem->move(
                $pasta, 
                $nomeImg
            );

            $caminhoArquivo = $pasta . DIRECTORY_SEPARATOR . $nomeImg;

            // 10 - Atualizar o registro
            $banner->imagem_banner = 'banner/' . $nomeImg;
            $banner->save();

            DB::commit();
            
            // 11 - Voltar para a listagem e exibir uma imagem de sucesso ou erro
            return redirect()
                ->route('admin.banner.index')
                ->with('sucesso', 'Banner: ' . $banner->titulo_banner . 'foi cadastrado com sucesso!');

        }catch(\Throwable $erro){

            DB::rollBack();

            if($caminhoArquivo && file_exists($caminhoArquivo)){
                unlink($caminhoArquivo);
            }

            report($erro);

            return redirect()
                ->back()
                ->withInput()
                ->with('erro', 'Não foi possível cadastrar o banner. Tente novamente mais tarde!');

        }

    }

}