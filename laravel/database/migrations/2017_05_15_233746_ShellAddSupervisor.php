<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Traits\ShellMigration;

class ShellAddSupervisor extends Migration
{
    use ShellMigration;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->updateExec("
sudo apt-get install supervisor
rm /etc/supervisor/conf.d/laravel-worker.conf
sudo ln -s /home/amcllc/amcapartments_com/mkt-git/laravel/extras/supervisor/laravel-worker.conf /etc/supervisor/conf.d/laravel-worker.conf

sudo supervisorctl reread

sudo supervisorctl update

sudo supervisorctl start laravel-worker:*
");
        //
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
