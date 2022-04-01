<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    // Es responsable de manejar las solicitudes de restablecimiento de contraseña
    use ResetsPasswords;

    // redirige a los usuarios despues de resetear el password
    protected $redirecTo = RouteServiceProvider::HOME;

}
