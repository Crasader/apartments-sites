<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DowndateMediaLibraryToV4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('media', function(Blueprint $table) {
            $table->text('mime_type')
                ->nullable()
                ->change();
            $table->text('manipulations')
                ->change();
            $table->text('custom_properties')
                ->change();
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
