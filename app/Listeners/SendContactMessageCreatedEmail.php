<?php

namespace App\Listeners;

use App\Events\ContactMessageCreated;
use App\Mail\ContactMessageCreated as MailContactMessageCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendContactMessageCreatedEmail
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
     * @param  object  $event
     * @return void
     */
    public function handle(ContactMessageCreated $event)
    {
        return Mail::to('admin@building-management.test')
            ->send(new MailContactMessageCreated($event->contactMessage));
    }
}
