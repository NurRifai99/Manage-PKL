<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next):Response{
        if(auth()->user() && auth()->user()->hasRole('super_admin')==false){
            session()->flash('error','You are not allowed to access this page');
            return redirect()->back();
            // abort('403','lol');
        }
        return $next($request);
    }
}
