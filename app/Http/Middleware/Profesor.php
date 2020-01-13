<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Profesor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      //comprueba que el usuario esta autenticado y si es admin o no
      if( Auth::guard('profesor')->check() &&  Auth::guard('profesor')->user()->admin == 0){

        return $next($request);
      }
        return redirect('home/admin');
    }
}
