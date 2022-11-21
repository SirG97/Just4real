<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function gym(){
        return view('gym');
    }

    public function sports(){
        return view('sports');
    }

    public function spareParts(){
        return view('spare-parts');
    }

    public function wines(){
        return view('wine');
    }

    public function contact(){
        return view('contact');
    }
}
