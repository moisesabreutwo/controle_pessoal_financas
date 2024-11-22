<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function getDadosExcepcionais(){
        
        return view('home');

    }

    public function videosEducacionais(){
        return view('videos_educacionais');
    }

    public function outrosVideos(){
        return view('outros_videos');
    }

    public function contratar(){
        return view('contratar');
    }

}
