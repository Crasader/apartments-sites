<?php

namespace App\Property;

use Illuminate\Database\Eloquent\Model;
use App\Property\Text\TextScope;

class Text extends Model
{
    //
    protected $table = 'property_text';

    protected static function boot(){
        if(!\App::runningInConsole()){
            parent::boot();
            static::addGlobalScope(new TextScope());
        }
    }

    public function belongsToType(){
        return $this->belongsTo('App\Property\Text\Type');
    }
}
