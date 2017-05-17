<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsFloorplanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	if(!Schema::hasTable('assets_floorplan')){
        Schema::create('assets_floorplan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_legacy_property_id');
            $table->string('floorplan_name');
            $table->enum('extension',['jpg','png','gif','jpeg']);
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
        Schema::dropIfExists('assets_floorplan');
    }
}
