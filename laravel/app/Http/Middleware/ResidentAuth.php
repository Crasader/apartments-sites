<?php

namespace App\Http\Middleware;

use Closure;
use App\System\Session;

class ResidentAuth 
{
    public function handle($request,Closure $next){
        if($this->uriException($request)){
            return $next($request);
        }
        if($this->isLoggedIn()){
            return $next($request);
        }else{
            return redirect('/resident-portal');
        }
    }

    public function isLoggedIn(){
        return Session::residentUserLoggedIn();
    }

    public function uriException($request){
        if(strcmp($request->segment(1),"resident-portal") == 0 && strlen($request->segment(2)) == 0){
            return true;
        }
        if(strcmp($request->segment(1),"resident-portal") == 0 &&
            strcmp($request->segment(2),"portal-center") == 0 &&
            isset($_POST['email']) && isset($_POST['pass']))
        {
            return true;
        }
        return false;
    }
}
