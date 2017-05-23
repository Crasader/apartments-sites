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
        Schema::table('property_entity', function (Blueprint $table) {
            if (Schema::hasColumn('property_entity', 'fk_legacy_property_id')) {
                return;
            }
            $table->integer('fk_legacy_property_id');
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
