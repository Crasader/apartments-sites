<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPageAccessTokenExpirationToReviewPlace extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(Schema::hasColumn('review_place','page_access_token_expiration')){ return; }
        Schema::table('review_place',function($table){
            $table->integer('page_access_token_expiration')->nullable();
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
