<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

Class AdminController extends Controller{

    public function dash(){

        return view('admin.dashboard.dashboard');
    
        }

}