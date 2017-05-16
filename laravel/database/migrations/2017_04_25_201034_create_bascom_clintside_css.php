<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBascomClintsideCss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $temp = app()->make("App\Property\Clientside\Assets");
        $entity = \DB::connection('mysql')->table('property_entity')
            ->where('filesystem_id', '166tbl-80-on-gibson')
            ->get();
        if (count($entity) == 0) {
            echo "Shit, can't make the clientside assets because the entity doesnt exist!\n";
            exit(0);
        }
        $temp->fk_property_id = $entity[0]->fk_legacy_property_id;
        $temp->uri = '/bascom/css/166TBL.css';
        $temp->uri_type = 'css';
        $temp->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
