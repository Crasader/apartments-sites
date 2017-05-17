<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailEmailAddressesRelation extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('email_email_address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('email_id');
            $table->integer('email_address_id');
            $table->string('address_type');
            $table->softDeletes();
            $table->timestamps();
        });
        //
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        if (Schema::hasTable('email_email_address')) {
            Schema::drop('email_email_address');
        }
        //
    }
}
