<?php

namespace App\Listeners;

use App\Events\ContactMessageDeleted;
use App\Mail\ContactMessageDeleted as MailContactMessageDeleted;
use Illuminate\Support\Facades\Mail;

class SendContactMessageDeletedEmail
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
    public function handle(ContactMessageDeleted $event)
    {
        return Mail::to('admin@building-management.test')
            ->send(new MailContactMessageDeleted($event->contactMessage));
    }
}
