<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use App\User;
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
        if(Auth::check())
        {
            $use = Auth::user();
            if($use ->level == 'Admin'){
                return $next($request);
            }else{
                return redirect('admin/login');
            }    
        }else{
            return redirect('admin/login');
        }
    }
}
