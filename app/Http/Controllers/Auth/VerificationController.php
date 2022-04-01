<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    // Controlador para la verificación del email

    use VerifiesEmails;

    // Redirección de los usuarios despues de la verificación
    protected $redirecTo = RouteServiceProvider::HOME;

    // Crear una nueva instancia del controlador
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
