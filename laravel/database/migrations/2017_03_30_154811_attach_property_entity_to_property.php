<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AttachPropertyEntityToProperty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('property_entity',function(Blueprint $table){
            if(Schema::hasColumn('property_entity','fk_legacy_property_id')){
                return;
            }
            $table->integer('fk_legacy_property_id');
            $table->foreign('fk_legacy_property_id')
                ->references('id')->on('property')
                ->onDelete('cascade');
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
