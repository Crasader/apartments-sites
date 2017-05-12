<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CssInsert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'css:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inserts css files into the db if they aren\'t already in there! How convenient!';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        foreach(app()->make('App\Template')->get()->toArray() as $index => $template){
            $path = public_path() . '/' . $template['name'] . '/css/*';
            foreach(glob($path) as $i => $f){
                if(preg_match("|([0-9A-Z]{6}\.css)|",$f,$matches)){
                    $prop = app()->make('App\Legacy\Property');
                    $p = $prop::where('code',str_replace(".css","",$matches[1]))->get()->toArray();
                    if($p[0]['code'] . ".css" == $matches[1]){
                        echo "Css found: " . $template['name'] . "/" . $p[0]['code'] . ": entires in db: " ;
                        $assets = app()->make('App\Property\Clientside\Assets')
                            ->where('uri',"/" . $template['name'] . "/css/" . $p[0]['code'] . ".css")
                            ->get();
                        if(count($assets) == 0){
                            echo "0 --[ Inserting : " ;
                            $assets = new \App\Property\Clientside\Assets;
                            $assets->uri_type = "css";
                            $assets->uri = "/" . $template['name'] . "/css/" . $p[0]['code'] . ".css";
                            $assets->fk_property_id = $p[0]['id'];
                            $assets->save();
                            echo "-- OK]" . PHP_EOL;
                        }else{
                            echo count($assets) . "-- [ Not Inserting ] --" . PHP_EOL;
                        }
                    }
                }
            }
        }
        return;
    }
}
