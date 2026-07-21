<?php 

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class HomeController extends Controller{

    // Método HOME - Carregar INDEX
    public function home(){

        return view('site.home.home');

    }

} // FIM DA CLASSE