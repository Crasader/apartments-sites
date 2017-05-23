<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProcessCategoryToMailerQueue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (Schema::hasColumn('mailer_queue', 'process_category')) {
            return;
        }
        Schema::table('mailer_queue', function ($table) {
            $table->string('process_category');
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
