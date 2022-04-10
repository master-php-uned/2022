<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ config('app.name', 'UNED App') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;700&display=swap" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-grey-200 min-h-screen leading-none">
	<div id="app">
		<nav class="bg-gray-800 shadow-md py-2">
			<div class="container mx-auto md:px-0">
				<div class="flex items-center justify-around">
					<a class="text-2xl text-white" href="{{ url('/') }}">
							{{ config('app.name', 'UNED App') }}
					</a>

					<nav class="flex-1 text-right">

						@guest
							{{-- El usuario no se ha autentificado --}}
							@if (Route::has('login'))

								<a class="text-white no-underline hover:underline hover:text-gray-300 p-3" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>

							@endif

							@if (Route::has('register'))

								<a class="text-white no-underline hover:underline hover:text-gray-300 p-3" href="{{ route('register') }}">{{ __('Registrarse') }}</a>

							@endif
						@else
							{{-- El usuario esta autentificado --}}
							<span class="text-gray-300 text-sm pr-4">{{ Auth::user()->name }}</span>
							<a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('logout') }}"
														onclick="event.preventDefault();
																		document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>

							@endguest

						</nav>
					</div>
				</div>
			</nav>

            <div class="bg-gray-700">
                <nav class="container mx-auto flex space-x-1">
                    @yield('navigation')
                </nav>
            </div>

			<main class="py-4">
					@yield('content')
			</main>
	</div>
</body>
</html>
