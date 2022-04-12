<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberMiddleware
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
        if(auth()->check()){
            switch(Auth::user()->type_id){
                case ('1'):
                    return $next($request);//si es miembro continua en la ruta members
                break;
                case('2'):
                    return redirect('users');/// si es un administrador redirige a la ruta users
                break;
                case ('3'):
                    return redirect('/');//si es invitado se redirige al welcome
                break;
            }
        }
    }
}
