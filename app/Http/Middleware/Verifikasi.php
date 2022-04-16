<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class verifikasi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user() != null){
            if((strpos($request->url(),'/'.auth()->user()->jabatan))){
                return $next($request);
            }
            return redirect()->intended(route(auth()->user()->jabatan));
        } else {
            return redirect()->route('login');
        }

    }
}
