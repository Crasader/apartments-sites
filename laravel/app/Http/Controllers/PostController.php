<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property\Site;

class PostController extends Controller
{
    protected $_allowed = [
        'unit' => 'handleUnit',
        'contact' => 'handleContact',
    ];
    //
    public function handle(string $page){
        var_dump($page);
        if(!in_array($page,array_keys($this->_allowed))){
            return null;
        }
        return $this->{$this->_allowed[$page]}();
    }

    public function handleUnit(){
        $data = $_POST;
        Site::$instance = $site = app()->make('App\Property\Site');
        
    }
}
