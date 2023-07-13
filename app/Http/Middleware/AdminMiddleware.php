<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if (Auth::guard()->check() && Auth::user()->role == "Admin") {
            return $next($request);
            // return redirect('/login');
        }

        abort(403, 'Unauthorized');
        // if($request->path()=="login" && $request->session()->has('user'))
        // {
        //     return redirect('/home');
        // }
        // if(!$request->session()->has('user'))
        // {
        //     return redirect('/login');
        // }

        // if(Auth::guard()->user()->role=='Admin')
        // {
        // return $next($request);
        // }

    }
}
