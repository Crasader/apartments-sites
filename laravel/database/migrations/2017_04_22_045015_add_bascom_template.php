<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Template;

class AddBascomTemplate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $foo = \DB::connection('mysql')->table('templates')->where('name','bascom')->get();
        if(count($foo)){
            return;
        }else{
            $temp = new Template;
            $temp->name = 'bascom';
            $temp->filesystem_id = 'bascom';
            $temp->save();
        }

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
