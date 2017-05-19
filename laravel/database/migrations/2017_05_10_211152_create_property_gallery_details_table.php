<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyGalleryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (Schema::hasTable('property_gallery_details')) {
            return;
        }
        Schema::table('property_gallery_details', function ($table) {
            $table->increments('id');
            $table->string('str_title', 64);
            $table->string('str_description', 256);
            $table->string('image_name', 1024);
            $table->integer('display_order')->default(0);
            $table->string('image_type')->nullable();
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
