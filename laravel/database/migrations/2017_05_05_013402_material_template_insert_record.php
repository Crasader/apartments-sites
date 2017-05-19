<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MaterialTemplateInsertRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $templates = app()->make('App\Template');
        if (count($templates->where('name', 'material')->get())) {
            echo "Material template already in db...exiting" . PHP_EOL;
            return;
        }

        $templates = new \App\Template;
        $templates->name = $templates->filesystem_id = 'material';
        $templates->save();
        echo "Saved template : MATERIAL" . PHP_EOL;
        return;
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
