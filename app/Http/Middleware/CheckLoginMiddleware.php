<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckLoginMiddleware
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
        if(Auth::user() == NULL){                      
            return redirect()->route('login');
        }
        // else{
        //     return redirect()->route('carrinho.index');
        // }

        // dd(Auth::user());
        // exit;
        return $next($request);        
    }
}
