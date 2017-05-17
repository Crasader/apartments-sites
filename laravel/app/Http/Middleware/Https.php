<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use App\Util\Util;

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
        if($this->hostIsException()){
            return $next($request);
        }
        
		if (!$request->secure()){// && env('APP_ENV') === 'prod') {
			return redirect()->secure($request->getRequestUri());
		}
		return $next($request); 
    }

    public function hostIsException(){
        if(preg_match("|^dev\.|",Util::serverName())){ return true; }
        if(preg_match("|^staging\.|",Util::serverName())){
            return true;
	}
        if(file_exists(config_path() . "/https-exceptions.json") == false){
            return false;
        $foo = json_decode(file_get_contents(config_path() . "/https-exceptions.json"),true);
        $keys = array_keys($foo);
        $serv = str_replace("www.","",Util::serverName());
        return in_array($serv,$keys);
    }
}
