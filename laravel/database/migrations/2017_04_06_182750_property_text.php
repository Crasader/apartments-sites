<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PropertyText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	if(!Schema::hasTable('property_text')){
        Schema::create('property_text', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entity_id');
            $table->integer('property_text_type_id');
            $table->string('string_value');
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
        Schema::dropIfExists('property_text');
    }
}
