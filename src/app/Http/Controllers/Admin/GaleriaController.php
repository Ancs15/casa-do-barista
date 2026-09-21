<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

Class GaleriaController extends Controller {

    //CRUD GALERIA: R
    public function index() {

        $listaGaleria = Galeria::orderByDesc('id_galeria')
                                                   ->get();
        //dd($listaGaleria);

        return view('admin.galeria.index', compact('listaGaleria'));

    }

    //CRUD GALERIA: C
    public function store(Request $request) {

        //Validar dados
        $dados = $request->validate([
            'nome_galeria' => 'required|max:50',
            'imagem_galeria' => 'required|image|mimes:png,jpg,webp,jpeg|max:4096',
            'status_galeria' => 'required|in:ATIVO,INATIVO'
        ]);

        $caminhoArquivo = null;

        try{

            DB::beginTransaction();

            //Cadastrar no banco
            $galeria = Galeria::create([
                'nome_galeria' => $dados['nome_galeria'],
                'imagem_galeria' => 'galeria/sem-foto.png',
                'status_galeria' => $dados['status_galeria']
            ]);

            //receber a imagem enviada
            $imagem = $request->file('imagem_galeria');

            //criar um nome para a imagem
            $tituloImg = Str::slug($dados['nome_galeria']);

            //pegar a extensão
            $extensao = strtolower($imagem->getClientOriginalExtension());

            //criar nome final
            $nomeImg = $tituloImg . '_' . $galeria->id_galeria . '.' . $extensao;

            //Salvar a imagem
            $pasta = public_path('barista/img/galeria');

            //criar a pasta se não existir
            if(!is_dir($pasta)){
                    mkdir($pasta, 0775, true);
            }

            //mover a imagem
            $imagem->move(
                $pasta,
                $nomeImg
            );

            $caminhoArquivo = $pasta . DIRECTORY_SEPARATOR . $nomeImg;

            //atualizar registro
            $galeria->imagem_galeria = 'galeria/' . $nomeImg;
            $galeria->save();

            DB::commit();
            //voltar a listagem
            return redirect()
                ->route('admin.galeria.index')
                ->with('sucesso', 'IMAGEM: ' . $galeria->nome_galeria . ' foi cadastrada com sucesso!');

        }catch(\Throwable $erro){

            DB::rollBack();

            if($caminhoArquivo && file_exists($caminhoArquivo)){
                unlink($caminhoArquivo);
            }

            report($erro);

            return redirect()
                ->back()
                ->withInput()
                ->with('erro', 'Não foi possível cadastrar a imagem.' . $erro->getMessage());
        }

    }

    //CRUD GALERIA: U
    public function update(Request $request, int $id) {

        // 1 - VALIDAR OS DADOS RECEBIDOS
        $dados = $request->validate([
            //Titulo obrigatório, max 50 caracteres
            'nome_galeria' => 'required|max:50',
            //Imagem obrigatória e tem que ser reconhecida como arquivo de imagem
            'imagem_galeria' => 'nullable|image|mimes:jpg,png,webp,jpeg|max:4096',
            //status é obrigatório
            'status_galeria' => 'required|in:ATIVO,INATIVO'
        ]);

        // 2 - Buscar a imagem
        $galeria = Galeria::findOrFail($id);

        try{

            // Título atual
            $tituloSlug = Str::slug($dados['nome_galeria']);

            // Nome da pasta
            $pasta = public_path('barista/img/galeria');

            // Caminho salvo no banco
            $caminhoArquivo = $galeria->imagem_galeria;

            // Caminho físico da imagem atual
            $imgAntiga = public_path('barista/img/' . $galeria->imagem_galeria);

            // CASO 1: NOVA IMAGEM
            if($request->hasFile('imagem_galeria')){
                
                
                $imagem = $request->file('imagem_galeria');
            
                $extensao = strtolower($imagem->getClientOriginalExtension());
                

                $nomeImg = $tituloSlug . '_' . 
                $galeria->id_galeria . '.' . $extensao;

                // Excluir a imagem anterior
                if(file_exists($imgAntiga)) {
                    unlink($imgAntiga);
                }

                // Salva a nova imagem
                $imagem->move($pasta, $nomeImg);


                $caminhoArquivo = 'galeria/' . $nomeImg;
            }elseif($galeria->nome_galeria !== $request->nome_galeria){
                // CASO 2 - Mudou somente o nome
                $extensao = pathinfo($galeria->imagem_galeria, PATHINFO_EXTENSION);

                $nomeImg = $tituloSlug . '_' . $galeria->id_galeria . '.' . $extensao;

                $novaImagem = public_path('barista/img/galeria/' . $nomeImg);

                if(file_exists($imgAntiga)){

                    rename(
                        $imgAntiga,
                        $novaImagem
                    );

                    $caminhoArquivo = 'galeria/' . $nomeImg; 

                }
            }

            // ATUALIZA NO BANCO
            $galeria->update([
                'nome_galeria' => $dados['nome_galeria'],
                'imagem_galeria' => $caminhoArquivo,
                'status_galeria' => $dados['status_galeria'],
            ]);
            
            // 11 - Voltar para a listagem e exibir uma imagem de sucesso ou erro
            return redirect()
                ->route('admin.galeria.index')
                ->with('sucesso', 'IMAGEM: ' . $galeria->nome_galeria . ' foi atualizado com sucesso!');

        }catch(\Throwable $erro){

            report($erro);

            return redirect()
                ->back()
                ->with('erro', ' Não foi possível atualizar a imagem. Tente novamente mais tarde!');

        }

    } // FIM DO MÉTODO UPDATE
}