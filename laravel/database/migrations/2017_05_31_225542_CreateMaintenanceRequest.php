<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_requests', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('resident_name');
            $table->string('maintenance_unit');
            $table->string('email');
            $table->string('maintenance_phone');
            $table->string('property_code');
            $table->boolean('perm2enter')->nullable();
            $table->string('maintenance_name')->nullable();
            $table->datetime('permission_to_enter_date')->nullable();
            $table->string('maintenance_mrequest');
            $table->string('work_order_number')
                ->nullable()
                ->comment('Returned from soap');
            $table->string('status')
                ->nullable()
                ->comment('Returned from soap');
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
        //
    }
}
