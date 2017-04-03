<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Property\Site;
use App\Property\Specials;
use App\Property\SpecialsFetcher;
use App\Interfaces\IDataFetcher;
use App\Assets\SoapClient as AssetsSoapClient;

class SpecialsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->bind('App\Property\Specials',function($app){
            if(is_object(Site::$instance)){
                return new Specials(Site::$instance);
            }else{
                return new Specials($app->make('App\Property\Specials'));
            }
        });

        $this->app->when(SpecialsFetcher::class)
            ->needs(IDataFetcher::class)
            ->give(function($app){
                return $app->make(AssetsSoapClient::class);
            }
        );
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
