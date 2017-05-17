<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateHttpsException extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'httpsexception:create {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use this command to make it so that a domain isnt automatically forwarded to https';

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
        $url  = $this->argument('url');
        $objects = [];
        if(!file_exists(config_path() . "/https-exceptions.json")){
            shell_exec("touch " . config_path() . "/https-exceptions.json");
        }
        $fileContents = file_get_contents(config_path() . "/https-exceptions.json");
        $objects = json_decode($fileContents,true);
        $objects[$url] = '$money$'; 
        file_put_contents(config_path() . "/https-exceptions.json",json_encode($objects));
        echo "DONE\n";
    }
}
