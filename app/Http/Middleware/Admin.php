<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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

      //comprueba que el usuario está autenticado y si el atributo admin es igual a 1
      if( Auth::guard('profesor')->check() &&  Auth::guard('profesor')->user()->admin == 1){

            return $next($request);
          }
            return redirect('/home');


            
    }
}
