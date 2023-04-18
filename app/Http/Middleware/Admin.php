<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class Admin

{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    
        $user = collect(Auth::user()->roles)->first();

           if(Auth::user()&& $user->name == "admin"){
                return $next($request);
            
            }
              return redirect(route('admin.register'))->with('error','You have not admin access');

            }

    
}
