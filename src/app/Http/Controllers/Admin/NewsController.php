<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;

Class NewsController extends Controller {

    public function index() {

        $listaNews = News::orderByDesc('id_news')->get();
        //dd($listaNews);

        return view('admin.newsletter.index', compact('listaNews'));

    }

}