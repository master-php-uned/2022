@extends('layouts.app')

@section('navigation')
    @include('ui.adminnav')

@endsection


@section('content')
    <h1 class="text-3xl text-center mt-10"> Ver Usuario </h1>

    <div class="mt-10 mb-20 md:flex items-start">
        <div class="md:w-3/5 mx-auto">

            <p class="block text-gray-700 font-bold my-2">
                Nombre: <span class="font-normal"> {{$user->name}} </span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Fecha de alta: <span class="font-normal"> {{$user->created_at->diffForHumans() }} </span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Correo electrónico: <span class="font-normal"> {{$user->email}} </span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Rol: <span class="font-normal"> {{$user->type->type}} </span>
            </p>

        </div>
    </div>

@endsection
