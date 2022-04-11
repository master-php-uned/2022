@extends('layouts.app')

@section('navigation')
    @include('ui.adminnav')

@endsection

@section('content')
<h1 class="text-2xl text-center mt-10">Editar Usuarios</h1>

<div class="container mx-auto max-w-screen-md">
    <div class="flex flex-wrap justify-center">
      <div class="md:w-1/2">
        <div class="w-full max-w-sm">
          <div class="flex flex-col break-words bg-white border-2 shadow-md mt-20">
            <div class="bg-gray-300 text-gray-700 uppercase text-center py-3 px-6 mb-0">
              Editar Usuario {{ $user->name }}
            </div>

            <form class="py-10 px-5" method="POST" action="{{ route('users.store') }}" novalidate>
              @csrf

              <div class="flex flex-wrap mb-6">
                <label for="name" class="block text-gray-700 text-sm mb-2">{{ __('Name') }}</label>
                <input id="name" type="text" class="p-3 bg-gray-200 rounded form-input w-full @error('name') border-red-500 border @enderror" name="name" value="{{ $user->name }}" autocomplete="name" autofocus>

                @error('name')
                  <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="flex flex-wrap mb-6">
                <label for="email" class="block text-gray-700 text-sm mb-2">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="p-3 bg-gray-200 rounded form-input w-full @error('email') border-red-500 border @enderror" name="email" value="{{ $user->email }}" autocomplete="email">

                @error('email')
                  <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              {{-- <div class="flex flex-wrap mb-6">
                <label for="password" class="block text-gray-700 text-sm mb-2">{{ __('Password') }}</label>
                <input id="password" type="password" class="p-3 bg-gray-200 rounded form-input w-full @error('password') border-red-500 border @enderror" name="password" autocomplete="new-password">

                @error('password')
                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="flex flex-wrap mb-6">
                <label for="password-confirm" class="block text-gray-700 text-sm mb-2">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="p-3 bg-gray-200 rounded form-input w-full" name="password_confirmation" autocomplete="new-password">
              </div> --}}

              <div class="flex flex-wrap mb-6">
                  <label class="block text-gray-700 text-sm mb-2" for="type_id">Tipo de Usuario</label>
                  <select class="p-3 bg-gray-200 rounded form-input w-full @error('type_id') border-red-500 border @enderror" name="type_id" id="type_id">
                      <option disabled value="">-- Seleccione --</option>
                      @foreach ($types as $type)
                          <option value="{{ $type->id }}" {{ $user->type_id == $type->id ? 'selected' : '' }}>{{ $type->type }}</option>
                      @endforeach
                  </select>
                  @error('type_id')
                      <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="flex flex-wrap">
                <button type="submit" class="bg-teal-500 w-full hover:bg-teal-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">
                  Editar Usuario
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
