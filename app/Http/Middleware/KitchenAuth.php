<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KitchenAuth
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
        if(( $path == "kitchen") && Session::get('kitchen')){
           return redirect('kitchen/dashboard');
       }
       else if(($path!= 'kitchen') && (!Session::get('kitchen'))){
           return redirect('kitchen');
       }
        return $next($request);
    }
}
