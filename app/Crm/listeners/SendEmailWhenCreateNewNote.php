<?php

namespace App\Crm\listeners;

use App\Crm\events\NewNote;
use App\Crm\events\welcome;
use App\Mail\NewNote as MailNewNote;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailWhenCreateNewNote
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
     * @param  \App\Crm\events\NewNote  $event
     * @return void
     */
    public function handle(NewNote $event)
    {
        Mail::to('midosok123@gmail.com')->send(new MailNewNote($event->getNote()));
    }
    
}
