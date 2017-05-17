<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class Admin extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        
    ];

    public function handle($request, Closure $next) {
        //TODO: Change this to something less specific to tags
        if(session('tags-admin-userid') != 1){
            return redirect('/admin');
        }
		return $next($request); 
    }
}
