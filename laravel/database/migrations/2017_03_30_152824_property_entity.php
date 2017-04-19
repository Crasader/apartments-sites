<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PropertyEntity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	if(!Schema::hasTable('property_entity')){
        Schema::create('property_entity', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_group_id')->unsigned();
            $table->string('property_name',16);
            $table->string('filesystem_id');
            $table->timestamps();
            $table->foreign('property_group_id')->references('id')
                ->on('property_group')
                ->onDelete('cascade')
                ;
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
        Schema::dropIfExists('property_entity');
    }
}
