<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDisplayOrderToFeatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	if(!Schema::hasColumn('property_apartment_feature','display_order')){
        Schema::table('property_apartment_feature',function(Blueprint $table){
            $table->integer('display_order');
        });
	}
	if(!Schema::hasColumn('property_community_feature','display_order')){
        Schema::table('property_community_feature',function(Blueprint $table){
            $table->integer('display_order');
        });
	}
	if(!Schema::hasColumn('property_other_feature','display_order')){
        Schema::table('property_other_feature',function(Blueprint $table){
            $table->integer('display_order');
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
        //
    }
}
