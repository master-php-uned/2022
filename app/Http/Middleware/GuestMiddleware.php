<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        switch(Auth::user()->type_id){
            case ('1'):
                return redirect('members');//si es administrador redirige a la ruta members
            break;
            case('2'):
                return redirect('users');// si es un administrador redirige al Users
            break;
            case ('3'):
                return $next($request);//si es el usuario invitado continua al welcome
            break;
        }
    }
}
