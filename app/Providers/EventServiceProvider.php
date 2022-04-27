<?php

namespace App\Providers;

use App\Events\LanguagecreatedEvent;
use App\Events\UserCreatedEvent;
use App\Listeners\IncremantNumberUsersOfDefaultLanguageListenern;
use App\Listeners\NewLanguageNecessaryBusinessSettingsListener;
use App\Listeners\NewUserRegistredListener;
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
        UserCreatedEvent::class => [
           IncremantNumberUsersOfDefaultLanguageListenern::class
        ],
        LanguagecreatedEvent::class => [
          NewLanguageNecessaryBusinessSettingsListener::class
        ]
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
