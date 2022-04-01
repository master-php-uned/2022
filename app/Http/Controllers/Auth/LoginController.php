<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // Maneja la autentificación de los usuarios para la aplicación y los redirige a la página home
    
    use AuthenticatesUsers;

    // redirección del usuario tras el login
    protected $redirecTo = RouteServiceProvider::HOME;

    //Crea una nueva instancia del controlador
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Validación para la solicitud de registro entrante
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'El campo Correo Electrónico es obligatorio.',
            'email.string' => 'El campo Correo Electrónico no puede ser un número',
            'email.email' => 'El Correo Electrónico debe ser valido.',
            'password.required' => 'El campo Contraseña es obligatorio.',
        ]);
    }

}
