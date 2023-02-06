<?php

namespace App\Crm\listeners;

use App\Crm\events\welcome;
use App\Mail\NewUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailWhenUserRegister
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
     * @param  \App\Crm\events\welcome  $event
     * @return void
     */
    public function handle(welcome $event)
    {
        Mail::to($event->user->email)->send(new NewUserMail());
    }
}
