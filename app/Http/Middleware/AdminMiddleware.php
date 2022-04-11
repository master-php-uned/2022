<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
            case ('2'):
                return $next($request);//si es administrador continua al Users
            break;
			case('3'):
                return redirect('/');// si es un usuario invitado redirige a la ruta welcome
			break;
        }

        return $next($request);
    }
}
