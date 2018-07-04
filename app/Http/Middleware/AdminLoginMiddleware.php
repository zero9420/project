<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
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
             // // 登陆验证
        if(session('id')){

            return $next($request);

        } else {
            
            //跳转  
            return redirect('/admin/login');
        }

    }
}
