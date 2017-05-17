<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class EmailAddress extends Model
{
    protected $table = 'email_addresses';
    public $timestamps = true;
    protected $fillable = ['value'];
    //
    public function emails()
    {
        return $this->belongsToMany('App\Email')
            ->withPivot('address_type');
    }
}
