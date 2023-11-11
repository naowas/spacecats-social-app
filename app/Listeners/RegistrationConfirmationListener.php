<?php

namespace App\Listeners;

use App\Events\RegistrationConfirmationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationConfirmationMail;
use Illuminate\Support\Facades\URL;


class RegistrationConfirmationListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RegistrationConfirmationEvent $event): void
    {
        Mail::to($event->user->email)->send(new RegistrationConfirmationMail($event->user));

    }



}
