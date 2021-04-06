<?php

namespace Marlon\Lumen\Http\Middleware;

use Closure;

class AddHostToHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $response = $next($request);

        $response->header('Host', config('app.url'));

        return $response;
    }
}
