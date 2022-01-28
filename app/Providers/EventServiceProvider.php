<?php

namespace App\Providers;

use App\Events\ContactMessageCreated;
use App\Events\ContactMessageDeleted;
use App\Listeners\SendContactMessageCreatedEmail;
use App\Listeners\SendContactMessageDeletedEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ContactMessageCreated::class => [
            SendContactMessageCreatedEmail::class
        ],
        ContactMessageDeleted::class => [
            SendContactMessageDeletedEmail::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
