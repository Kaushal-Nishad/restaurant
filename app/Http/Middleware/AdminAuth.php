<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuth
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
         if(( $path == "admin/login") && Session::get('admin')){
            return redirect('admin/dashboard');
        }
        else if(($path!= 'admin/login') && (!Session::get('admin'))){
            return redirect('admin/login');
        }
        
        return $next($request);
         
    }
}
