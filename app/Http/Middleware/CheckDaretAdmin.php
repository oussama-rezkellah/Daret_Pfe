<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDaretAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$parameters): Response
    {
        $daretId = $parameters[0];
    
        if (auth()->check() && !auth()->user()->isDaretAdmin($daretId)) {
            abort(403, 'You are not authorized to perform this action.');
        }
    
        
        return $next($request);
    }
}
