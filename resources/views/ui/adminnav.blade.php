{{-- Podemos resaltar el enlace activo con Request::is indica desde donde viene el request es decir la llamada --}}
<a href="{{ route('users.index') }}" class="text-white text-sm uppercase font-bold p-3 {{ Request::is('users') ? 'bg-teal-500' : '' }}">Ver Usuarios</a>
<a href="{{ route('users.create') }}" class="text-white text-sm uppercase font-bold p-3 {{ Request::is('users/create') ? 'bg-teal-500' : '' }}">Nuevo Usuario</a>
