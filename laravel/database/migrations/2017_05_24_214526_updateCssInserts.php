<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Property\Clientside\Assets;

class UpdateCssInserts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $assets = Assets::get();
        foreach ($assets as $asset) {
            if (strpos($asset->uri, 'bascom')) {
                $line = str_replace('/bascom/css/properties/', '/bascom/css/', $asset->uri);
                $asset->uri = str_replace('/bascom/css/', '/bascom/css/properties/', $line);
            } elseif (strpos($asset->uri, 'dinapoli')) {
                $line = str_replace('/dinapoli/css/properties/', '/dinapoli/css/', $asset->uri);
                $asset->uri = str_replace('/dinapoli/css/', '/dinapoli/css/properties/', $line);
            }
            $asset->save();
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
        $assets = Assets::get();
        foreach ($assets as $asset) {
            if (strpos($asset->uri, 'bascom')) {
                $asset->uri = str_replace('/bascom/css/properties/', '/bascom/css/', $asset->uri);
            } elseif (strpos($asset->uri, 'dinapoli')) {
                $asset->uri = str_replace('/dinapoli/css/properties/', '/dinapoli/css/', $asset->uri);
            }
            $asset->save();
        }
    }
}
