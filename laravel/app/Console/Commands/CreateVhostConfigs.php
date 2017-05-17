<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateVhostConfigs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:vhosts {outdir}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates vhost configs for all properties';

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
        $outdir = $this->argument("outdir");

        if(!file_exists($outdir)){
            $this->info("$outdir doesn't exist... creating...");
            $this->info(shell_exec("mkdir $outdir"));
        }
        else{
            $this->info("Found outdir: {$outdir}... [OK]\n");
        }
        $vhostsTemplate = (dirname(__FILE__) . '/vhosts.template');
        if(!file_exists($vhostsTemplate)){
            $this->error("Vhosts template: {$vhostsTemplate} does not exists!");
            return;
        }
        $template = file_get_contents($vhostsTemplate);
        $hosts = '';
        foreach(\App\Legacy\Property::all() as $index => $object){
            $url = trim($object->url);
            $dub = preg_replace("|^http[s]{0,1}://|","",$url);
            $dub = preg_replace("|/(.*)$|","",$dub);
            $alias = preg_replace("|^www|","*",$dub);
            $servName = preg_replace("|^\*\.|","",$alias);
            $redirect = preg_replace("|https://|","http:/",$url);
            if(preg_match("|http://|",$redirect) == false){
                $redirect = "http://$redirect";
            }
            //$this->info($dub . " | $alias | $servName | $redirect");

            $buff = str_replace("[[[DUB_URL]]]",$dub,$template);
            $buff = str_replace("[[[ALIAS]]]",$alias,$buff);
            $buff = str_replace("[[[SERV_NAME]]]",$servName,$buff);
            $buff = str_replace("[[[REDIRECT]]]",$redirect,$buff);

            $fileName = preg_replace("|[^a-z0-9]+|","-",$url);
            $fileName = preg_replace("|[\-]{2,}|","-",$fileName);
            $fileName = preg_replace("|\-$|","",$fileName);
            if(strlen($fileName) == 0){
                $this->error("Url is crap: '$url' : " . $object->id);
                continue;
            }
            $fileName .= ".conf";
            //$this->info("Writing [ $outdir/$fileName ] ...");
            file_put_contents("$outdir/$fileName",$buff);
            $hosts .= "192.168.10.117 $servName\n192.168.10.117 www.{$servName}\n";
        }
        file_put_contents("$outdir/hosts",$hosts);
        $this->info("Writing files done");
        return;
    }
}
