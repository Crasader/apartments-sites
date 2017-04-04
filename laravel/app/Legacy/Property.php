<?php

namespace App\Legacy;

use Illuminate\Database\Eloquent\Model;
use App\Legacy\State;

class Property extends Model
{
    //
    protected $fillable = [
 		'code',			//code               | varchar(50)      | NO   |     | NULL    |                |
 		'name',			//               | varchar(50)      | NO   |     | NULL    |                |
 		'address',		//address            | varchar(128)     | NO   |     | NULL    |                |
 		'city',			//city               | varchar(50)      | NO   | MUL | NULL    |                |
 		'state_id',		//state_id           | int(10) unsigned | NO   | MUL | NULL    |                |
 		'zip',			//zip                | varchar(20)      | NO   |     | NULL    |                |
 		'phone',		//phone              | varchar(20)      | NO   |     | NULL    |                |
 		'fax',			//fax                | varchar(20)      | NO   |     | NULL    |                |
 		'email',		//email              | varchar(128)     | NO   |     | NULL    |                |
 		'image',		//image              | varchar(50)      | NO   |     | NULL    |                |
 		'url',			//url                | varchar(150)     | NO   | MUL | NULL    |                |
 		'price_range',	//price_range        | varchar(50)      | NO   |     | NULL    |                |
 		'unit_type',	//unit_type          | varchar(50)      | NO   |     | NULL    |                |
 		'special',		//special            | varchar(100)     | NO   |     | NULL    |                |
 		'mercial',		//mercial            | varchar(150)     | NO   |     | NULL    |                |
 		'description',	//description        | text             | NO   |     | NULL    |                |
 		'hours',		//hours              | text             | NO   |     | NULL    |                |
 		'pet_policy',	//pet_policy         | text             | NO   |     | NULL    |                |
 		'directions',	//directions         | text             | NO   |     | NULL    |                |
 		'featured',		//featured           | tinyint(1)       | NO   |     | 0       |                |
 		'status_id',	//status_id          | int(10) unsigned | NO   | MUL | NULL    |                |
 		'corporate_group_id'	//corporate_group_id | int(10) unsigned | NO   | MUL | 1       |                |
    ];

    protected $table = 'property';

    public function getState(){
        return State::find($this->state_id)->first()->name;
    }
}
