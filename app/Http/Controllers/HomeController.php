<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $session_products = session()->get('recently_viewed');
        return view('home.index', compact('session_products'));
    }



}
