<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('review_place',function($table){
            $table->increments('id');
            $table->integer('fk_legacy_property_id');
            $table->string('place_id',1024);
            $table->string('access_token',2048);
            $table->string('place_type',8);
            $table->timestamps();
            $table->create();
        });
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
