<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacebookAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(Schema::hasTable('facebook_accounts')){ return; }
        Schema::table('facebook_accounts',function($table){
            $table->increments('id');
            $table->integer('fk_account_id');
            $table->string('account_name',256);
            $table->string('account_id',64);
            $table->string('account_permissions',1024)->nullable();
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
