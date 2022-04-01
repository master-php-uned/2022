<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

	// Controlador que maneja el registro de nuevos usuarios, así como su validación y creación.

    use RegistersUsers;

    //redirige a los usuarios despues del registro
    protected $redirectTo = RouteServiceProvider::HOME;

    // se crea una nueva instancia del controlador
    public function __construct()
    {
        $this->middleware('guest');
    }

    
    //Validación para la solicitud de registro entrante
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'El campo Nombre es obligatorio.',
            'name.string' => 'El campo Nombre no puede ser un número.',
            'name.max' => 'El campo Nombre no ha de tener más de 255 caracteres.',
            'email.required' => 'El campo Correo Electrónico es obligatorio.',
            'email.string' => 'El campo Correo Electrónico no puede ser un número.',
            'email.email' => 'El Correo Electrónico debe ser valido.',
            'email.max' => 'El campo Correo Electrónico no ha de tener más de 255 caracteres.',
            'email.unique' => 'El Correo Electrónico ya existe en nuestra base de datos.',
            'password.required' => 'El campo Contraseña es obligatorio.',
            'password.min' => 'El campo Contraseña ha de contener al menos 8 caracteres.',
            'password.confirmed' => 'Las Contraseñas no coinciden.'
        ]);
    }

		// Cree una nueva instancia de usuario después de un registro válido.
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
