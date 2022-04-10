<?php

namespace App\Http\Controllers;

use App\Models\TypeUser;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Cosultas al modelo de typo de usuario
        $types = TypeUser::all();

        return view('users.create')
                    ->with('types', $types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación y mensajes de validación
        $data = $request->validate([
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

        return "desde store";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
