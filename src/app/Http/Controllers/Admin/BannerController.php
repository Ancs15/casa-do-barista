<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;

Class BannerController extends Controller {

    //Listar banners cadastrados
    public function index() {
        
        $listaBanner = Banner::orderByDesc('id_banner')->get();

        return view('admin.banner.index', compact('listaBanner'));

    }

}