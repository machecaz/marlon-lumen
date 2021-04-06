<?php

namespace Marlon\Lumen\Http\Middleware;

use Closure;

class ChangeLocaleMiddleware
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
        $locale = $request->header('accept-language');

        config(['app.locale' => $locale]);

        return $next($request);
    }
}
