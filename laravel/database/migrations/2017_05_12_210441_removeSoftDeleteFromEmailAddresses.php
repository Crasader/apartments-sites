<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveSoftDeleteFromEmailAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public static $tables = ['email_addresses', 'email_email_address'];
    public function up()
    {
        foreach (self::$tables as $table) {
            if (Schema::hasColumn($table, 'deleted_at')) {
                Schema::table($table, function ($innerTable) {
                    $innerTable->dropColumn('deleted_at');
                });
            }
        }
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach (self::$tables as $table) {
            if (!Schema::hasColumn($table, 'deleted_at')) {
                Schema::table($table, function ($innerTable) {
                    $innerTable->timestamp('deleted_at')->nullable();
                });
            }
        }
    }
}
