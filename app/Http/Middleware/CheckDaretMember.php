<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDaretMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$parameters)
{
    $daretId = $parameters[0];
    if (auth()->check() && !auth()->user()->isMemberOfDaret($daretId)) {
        abort(403, 'You are not a member of this daret.');
    }
    return $next($request);

}
}
