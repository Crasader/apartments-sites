<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class Https extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        'text-tag','text-tag-get','unit','redis','tags-logout'
    ];

    public function handle($request, Closure $next) {
		if (!$request->secure()){// && env('APP_ENV') === 'prod') {
			return redirect()->secure($request->getRequestUri());
		}
		return $next($request); 
    }
}
