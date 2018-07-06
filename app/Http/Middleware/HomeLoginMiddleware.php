<?php

namespace App\Http\Middleware;

use Closure;

class HomeLoginMiddleware
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
             if(session('user_id')){

            return $next($request);

        } else {
            
            //跳转  
            return redirect('/home/login');
        }

    }
}
