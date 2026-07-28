<?php 

//Nomeia o namespace do controller
namespace App\Http\Controllers\Site;

//UTiliza o controller padrão do Laravel
use App\Http\Controllers\Controller;
use App\Models\Depoimento;
use App\Models\Banner;

//Cria a classe HomeController
class HomeController extends Controller{

    // Método HOME - Carregar INDEX
    public function home(){

        //Busca todos os banners ativos em ordem aleatória no banco e armazena na variável $listaBanner
        $listaBanner = Banner::where('status_banner', 'ATIVO')->inRandomOrder()->get();

        //dd($listaBanner); Retorna a variável $listaBanner para teste.
        // var_dump($listaBanner); Retorna a variável $listaBanner para teste mas menos detalhado.

        //Buscar os depoimentos aprovados dos clientes junto com os dados do cliente que fez o depoimento

        $listaDepo = Depoimento::with('DepoimentoCliente')
                            ->where('status_depoimento', 'APROVADO')
                            ->orderByDesc('id_depoimento')
                            ->get();


        // dd($listaDepo->toArray()); // Retorna a variável $listaDepo para teste.


        //Carrega a view home e passa as variáveis para a view
        return view('site.home.home', compact('listaBanner', 'listaDepo'));

    }

} // FIM DA CLASSE