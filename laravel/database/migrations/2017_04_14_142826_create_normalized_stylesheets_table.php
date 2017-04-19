<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNormalizedStylesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('property_clientside_assets') == false){
            Schema::create('property_clientside_assets', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('fk_property_id');
                $table->string('uri',1024);
                $table->enum('uri_type',['js','css','img']);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_clientside_assets');
    }
}
