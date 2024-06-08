<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfSuccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $id): Response
    {
        if(Auth::user()->role_id != null){
            if(Auth::user()->role_id == $id){
                return $next($request);
            }
        }
        else{
            abort(403,'Account Suspend!');
        }
        
        return redirect('/redirects');
    }
}
