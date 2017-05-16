<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailerQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('mailer_queue')) {
            return ;
        }
        Schema::create('mailer_queue', function (Blueprint $table) {
            $table->increments('id');
            $table->string('to_address', 64);
            $table->string('from_address', 64);
            $table->text('cc');
            $table->string('subject', 256);
            $table->longText('body');
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
        Schema::dropIfExists('mailer_queue');
    }
}
