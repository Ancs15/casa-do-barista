<?php 

//Nomeia o namespace do controller
namespace App\Http\Controllers\Site;

//UTiliza o controller padrão do Laravel
use App\Http\Controllers\Controller;

//Importa os models a ser utilizados
use App\Models\Banner;
use App\Models\LinhaTempo;
use App\Models\Depoimento;
use App\Models\Galeria;

//Cria a classe HomeController
class HomeController extends Controller{

    // Método HOME - Carregar INDEX
    public function home(){

        //Busca todos os banners ativos em ordem aleatória no banco e armazena na variável $listaBanner
        $listaBanner = Banner::where('status_banner', 'ATIVO')->inRandomOrder()->get();

        //dd($listaBanner); Retorna a variável $listaBanner para teste.
        // var_dump($listaBanner); Retorna a variável $listaBanner para teste mas menos detalhado.

        //Busca os registros da linha do tempo ativos, em ordem crescente por ano
        $listaLinhaTempo = LinhaTempo::where('status_linha_tempo', 'ATIVO')->orderBy('ano_linha_tempo', 'ASC')->get();
        // dd($listaLinhaTempo); // Retorna a variável $listaLinhaTempo para teste

        //Buscar os depoimentos aprovados dos clientes junto com os dados do cliente que fez o depoimento

        $listaDepo = Depoimento::with('DepoimentoCliente')
                            ->where('status_depoimento', 'APROVADO')
                            ->orderByDesc('id_depoimento')
                            ->get();


        // dd($listaDepo->toArray()); // Retorna a variável $listaDepo para teste.

        //Buscar as imagens de galeria ativas em ordem aleatória no banco e armazena na variável $listaGaleria
        $listaGaleria = Galeria::where('status_galeria', 'ATIVO')->inRandomOrder()->get();

        // dd($listaGaleria);

        //Carrega a view home e passa as variáveis para a view
        return view('site.home.home', compact('listaBanner', 'listaDepo', 'listaGaleria', 'listaLinhaTempo'));

    }

} // FIM DA CLASSE