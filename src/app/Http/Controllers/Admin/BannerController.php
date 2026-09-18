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

    // CADASTRAR BANNER: C
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

    } // FIM DO MÉTODO STORE

    // ATUALIZAR BANNER: U
    public function update(Request $request, int $id) {

        // 1 - VALIDAR OS DADOS RECEBIDOS
        $dados = $request->validate([
            //Titulo obrigatório, max 50 caracteres
            'titulo_banner' => 'required|max:50',
            //Imagem obrigatória e tem que ser reconhecida como arquivo de imagem
            'imagem_banner' => 'nullable|image|mimes:jpg,png,webp,jpeg|max:4096',
            //status é obrigatório
            'status_banner' => 'required|in:ATIVO,INATIVO'
        ]);

        // 2 - Buscar o banner
        $banner = Banner::findOrFail($id);

        try{

            // Título atual
            $tituloSlug = Str::slug($dados['titulo_banner']);

            // Nome da pasta
            $pasta = public_path('barista/img/banner');

            // Caminho salvo no banco
            $caminhoArquivo = $banner->imagem_banner;

            // Caminho físico da imagem atual
            $imgAntiga = public_path('barista/img/' . $banner->imagem_banner);

            // CASO 1: NOVA IMAGEM
            if($request->hasFile('imagem_banner')){
                
                
                $imagem = $request->file('imagem_banner');
            
                $extensao = strtolower($imagem->getClientOriginalExtension());
                

                $nomeImg = $tituloSlug . '_' . 
                $banner->id_banner . '.' . $extensao;

                // Excluir a imagem anterior
                if(file_exists($imgAntiga)) {
                    unlink($imgAntiga);
                }

                // Salva a nova imagem
                $imagem->move($pasta, $nomeImg);


                $caminhoArquivo = 'banner/' . $nomeImg;
            }elseif($banner->titulo_banner !== $request->titulo_banner){
                // CASO 2 - Mudou somente o nome
                $extensao = pathinfo($banner->imagem_banner, PATHINFO_EXTENSION);

                $nomeImg = $tituloSlug . '_' . $banner->id_banner . '.' . $extensao;

                $novaImagem = public_path('barista/img/banner/' . $nomeImg);

                if(file_exists($imgAntiga)){

                    rename(
                        $imgAntiga,
                        $novaImagem
                    );

                    $caminhoArquivo = 'banner/' . $nomeImg; 

                }
            }

            // ATUALIZA NO BANCO
            $banner->update([
                'titulo_banner' => $dados['titulo_banner'],
                'imagem_banner' => $caminhoArquivo,
                'status_banner' => $dados['status_banner'],
            ]);
            
            // 11 - Voltar para a listagem e exibir uma imagem de sucesso ou erro
            return redirect()
                ->route('admin.banner.index')
                ->with('sucesso', 'Banner: ' . $banner->titulo_banner . ' foi atualizado com sucesso!');

        }catch(\Throwable $erro){

            report($erro);

            return redirect()
                ->back()
                ->with('erro', ' Não foi possível atualizar o banner. Tente novamente mais tarde!');

        }

    } // FIM DO MÉTODO UPDATE

    // ATIVAR e DESATIVAR o BANNER - D (U)
    public function status(Request $request, int $id) {

        try {

            // 2 - Buscar o banner
            $banner = Banner::findOrFail($id);

            $novoStatus = $banner->status_banner === 'ATIVO' ? 'INATIVO' : 'ATIVO';

            // ATUALIZA NO BANCO
            $banner->update([
                'status_banner' => $novoStatus,
            ]);

            $mensagem = $novoStatus === 'ATIVO' ? 'Banner ativado com sucesso' : ' Banner desativado com sucesso';

            // 11 - Voltar para a listagem e exibir uma imagem de sucesso ou erro
            return redirect()
                ->route('admin.banner.index')
                ->with('sucesso', $mensagem);

        } catch (\Throwable $erro) {

            report($erro);

            return redirect()
                ->back()
                ->with('erro', ' Não foi possível alterar o status do banner. Tente novamente mais tarde!');

        }

    } //FIM DO MÉTODO STATUS

}