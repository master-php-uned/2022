<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Crea una nueva instancia del controler
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    // Mostrar el panel de la aplicación
    public function index()
    {
        return view('home');
    }
}
