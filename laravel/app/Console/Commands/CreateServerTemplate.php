<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateServerTemplate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'template:create {url} {template}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use this command to add urls and associate templates to them';

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
        print("This has been deprecated, the site should bootstrap automatically based on the default template");
        exit();
        //
        $template = $this->argument("template");
        $url  = $this->argument('url');
        $fileContents = file_get_contents(ENV("SERVER_TEMPLATE_FILE"));
        $objects = json_decode($fileContents, true);
        $objects[$url] = $template;
        file_put_contents(ENV("SERVER_TEMPLATE_FILE"), json_encode($objects));
        echo "DONE";
    }
}
