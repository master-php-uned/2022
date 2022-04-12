<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestsController extends Controller
{
    //Crea una nueva instancia del controler
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'guestmiddleware']);
    }

    // Mostrar el panel de la aplicación
    public function index()
    {
        // Consulta del usuario miembro
        $guest =  Auth::user();

        return view('guests.index', compact('guest'));
    }
}
