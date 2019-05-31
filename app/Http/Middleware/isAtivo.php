<?php

namespace App\Http\Middleware;

use Closure;

class IsAtivo
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
        if(auth()->user()->ativo){
            
        return $next($request);
        }
        throw new AccessDeniedHttpException('Unauthorized.');
    }
}
