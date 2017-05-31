<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Traits\ShellMigration;

class ShellMigrationAddMediaLibrary extends Migration
{
    use ShellMigration;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $lines = [];
        $lines[] = "sudo apt install php7.0-gd";
        $lines[] = "sudo apt install php-imagick";
        $this->updateExec($lines);
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
