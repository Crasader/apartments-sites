<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Property\Site;
use App\System\Settings;
use App\Legacy\Property;

class CustomNavDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nav:delete {url} {index}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes a custom navigation item (for dinapoli templates currently)';

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
        $url = $this->argument("url");
        $index = $this->argument("index");
        $prop = Property::where('url', 'LIKE', "%$url%")
            ->first();
        if (!$prop) {
            echo "Can't find property by that url\n";
            return;
        }
        $_SERVER['SERVER_NAME'] = $url;
        $settings = Settings::rawSite(true);
        if ($index == "list") {
            dd($settings);
        }
        $sObject = new Settings;
        $sObject->removeById($index);
        echo "After delete: " . PHP_EOL;
        dd(Settings::rawSite(true));
        return;
    }
}
