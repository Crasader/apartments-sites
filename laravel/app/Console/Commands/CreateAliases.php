<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateAliases extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:aliases {template} {alias} {realpath}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use this command to create page aliases for certain templates' .
            '. Example: make:aliases dinapoli "home-away-from-home" "/" ' . "\n" .
            'The above example will create a url for the dinapoli templates at: http://www.foo.com/home-away-from-home. ' .
            'The route controller will then process "home-away-from-home" as meaning "/"';

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
        $template = $this->argument("template");
        $alias = $this->argument("alias");
        $realpath = $this->argument("realpath");

        $path = resource_path() . '/views/layouts/' . $template;
        if(!file_exists($path)){
            $this->error("Invalid path! {$path}\n");
            return;
        }
        else{
            $this->info("Found path: {$path}... [OK]\n");
        }
        if(file_exists("{$path}/aliases")){
            $json = file_get_contents("{$path}/aliases");
        }else{
            $json = '';
        }

        $object = json_decode($json,true);
        $object[$alias] = $realpath;
        $this->info("JSON: '" . json_encode($object) . "'");
        $this->info("Copying aliases file for backup purposes...");
        if(file_exists("{$path}/aliases")){
            copy("{$path}/aliases","{$path}/aliases-bkup/" . date("Y-m-d_H:i:s"));
        }else{
            touch("{$path}/aliases");
        }
        $this->info("[OK]");
        $this->info("Writing...");
        file_put_contents("{$path}/aliases",json_encode($object));
        $this->info("[OK]");
        $this->info("{$path}/aliases: " . filesize("{$path}/aliases") . " bytes");
        return;
    }
}
