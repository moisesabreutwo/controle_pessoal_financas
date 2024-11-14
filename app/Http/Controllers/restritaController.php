<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class restritaController extends Controller
{
    public function homeAdmin(){

        return view('admin.restrita');
        
    }

    public function getDadosExcepcionais(){
        
        return view('admin.restrita');

    }

}
