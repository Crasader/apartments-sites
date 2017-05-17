<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailEmailAddressConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (Schema::hasTable('email_email_address')) {
            Schema::table('email_email_address', function ($table) {
                $table->integer('email_id')->unsigned()->change();
                $table->integer('email_address_id')->unsigned()->change();
            });
            
            Schema::table('email_email_address', function ($table) {
                $table->foreign('email_id')
                    ->references('id')
                    ->on('emails');
                $table->foreign('email_address_id')
                    ->references('id')
                    ->on('email_addresses');
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
        if (Schema::hasTable('email_email_address')) {
            Schema::table('email_email_address', function ($table) {
                $table->dropForeign('email_email_address_email_id_foreign');
                $table->dropForeign('email_email_address_email_address_id_foreign');
            });
        }
    }
}
