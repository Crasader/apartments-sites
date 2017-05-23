<?php

namespace App\Listeners;

use App\Events\RegisteredProperty as RegisteredPropertyEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisteredProperty
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RegisteredProperty  $event
     * @return void
     */
    public function handle(RegisteredPropertyEvent $event)
    {
        //
        //Dispatches a job to create filesystem stuff and whatnot
        
        /** TODO:
         * In teh future we'll probably want to send an email to someone when there is
         * a new registered property.
         */
        /*
        dispatch(
            (new \App\Jobs\FileSystemRegister($event))
            ->onQueue('filesystem')
            ->onConnection('database')
            ->delay(\Carbon\Carbon::now()->addMinutes(1))
        );
        */
    }
}
