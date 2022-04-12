<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembersController extends Controller
{
    //Crea una nueva instancia del controler
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'member']);
    }

    // Mostrar el panel de la aplicación
    public function index()
    {
        // Consulta del usuario miembro y paso de información a la vista
        $member =  Auth::user();

        return view('members.index', compact('member'));
    }
}
