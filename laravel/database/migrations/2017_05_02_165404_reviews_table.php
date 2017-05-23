<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('reviews')) {
            return;
        }
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_legacy_property_id');
            $table->enum('rating', [1,2,3,4,5]);
            $table->string('author_name');
            $table->string('author_url', 512);
            $table->string('language', 2);
            $table->string('relative_time_description', 20);
            $table->dateTime('post_time');
            $table->text('text_body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
