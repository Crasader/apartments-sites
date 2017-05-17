<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	if(!Schema::hasTable('property_group')){
        Schema::create('property_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('str_identifier',16);
            $table->string('group_name');
            $table->boolean('active_status')->default(DB::raw(0));
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('property_group');
    }
}
