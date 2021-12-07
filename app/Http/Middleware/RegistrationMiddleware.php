<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RegistrationMiddleware
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
        $path=$request->path();
        $para=$request->route()->parameters();
        $param=implode("",$para);
        // dd($param);
        if(($path=="login" || $path=="register" ) && session()->has('session')){
            return redirect('home');
        }
        elseif(($path=="home"||$path=="contactus"||$path=="userlist"||$path=="update/$param"||$path=="useredit/$param") && !session()->has('session')){
           return redirect('login');
        }
        
        return $next($request);
    }
}
