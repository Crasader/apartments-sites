<?php

use Illuminate\Database\Seeder;

use App\Property\Entity;
use App\Property\Site;
use App\Template;
use App\Property\Clientside\Assets;

class StyleSheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entities = \DB::table('property_entity')
            ->select(['fk_legacy_property_id','filesystem_id','fk_template_id'])
            ->get()
            ;
        foreach ($entities as $i => $obj) {
            $template = Template::find($obj->fk_template_id)
                ->get()
                ->toArray();
            if (file_exists($file = public_path() . "/" . $template[0]['filesystem_id'] . "/css/" .
                strtoupper(explode("-", $obj->filesystem_id)[0]) . ".css")) {
                echo "FILE EXISTS: $file\n";
                $find = Assets::select('id')->where('fk_property_id', $obj->fk_legacy_property_id)
                    ->get()
                    ->toArray();
                if (empty($find)) {
                    $assets = app()->make('App\Property\Clientside\Assets');
                    $assets->fk_property_id = $obj->fk_legacy_property_id;
                    $assets->uri = str_replace(public_path(), "", $file);
                    $assets->uri_type = 'css';
                    $assets->save();
                    echo "[*SUCCESS*] Asset saved...\n";
                }
            } else {
                echo "FILE DOESNT EXIST: $file\n";
            }
        }
    }
}
