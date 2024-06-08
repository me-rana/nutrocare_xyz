<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionIfTrue
{
    
    public function handle(Request $request, Closure $next): Response
    {
        $allowedDomain = '127.0.0.1';
        $checkHost =  $request->getHost();
        if ($checkHost && strpos($checkHost, $allowedDomain) !== false) {
            return $next($request);
        }
        abort(403, 'Unauthorized access.');
    }
}
