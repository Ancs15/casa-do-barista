<?php 

//Nomeia o namespace do controller
namespace App\Http\Controllers\Site;

//UTiliza o controller padrão do Laravel
use App\Http\Controllers\Controller;
use App\Models\Banner;

//Cria a classe HomeController
class HomeController extends Controller{

    // Método HOME - Carregar INDEX
    public function home(){

        //Busca todos os banners ativos em ordem aleatória no banco e armazena na variável $listaBanner
        $listaBanner = Banner::where('status_banner', 'ATIVO')->inRandomOrder()->get();

        // dd($listaBanner); Retorna a variável $listaBanner para teste.
        // var_dump($listaBanner); Retorna a variável $listaBanner para teste mas menos detalhado.

        //Carrega a view home e passa a $listaBanner para a view
        return view('site.home.home', compact('listaBanner'));

    }

} // FIM DA CLASSE