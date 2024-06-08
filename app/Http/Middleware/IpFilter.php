<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\IpBlock;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IpFilter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ipblock = IpBlock::where('ip_no',$request->getClientIp())->first();
        if($ipblock){
            abort(403, "Restricted due to ".$ipblock->reason);
        }
        return $next($request);
    }
}
