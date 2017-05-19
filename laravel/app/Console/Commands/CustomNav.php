<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Property\Site;
use App\System\Settings;
use App\Legacy\Property;

class CustomNav extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nav:custom {url} {label} {href} {after}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a custom navigation item (for dinapoli templates currently)';

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
        $label = $this->argument("label");
        $href = $this->argument("href");
        $after = $this->argument("after");

        $prop = Property::where('url', 'LIKE', "%$url%")
            ->first();
        if (!$prop) {
            echo "Can't find property by that url\n";
            return;
        }
        $_SERVER['SERVER_NAME'] = $url;
        $settings = Settings::site();
        $sObject = new Settings;
        $sObject->addCustomNav($label, $href, $after);
        dd(Settings::site());
    }
}
