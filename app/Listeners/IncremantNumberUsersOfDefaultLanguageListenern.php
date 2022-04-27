<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use App\Models\Language;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncremantNumberUsersOfDefaultLanguageListenern
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
    public function handle(UserCreatedEvent $event)
    {
        $language=Language::where('is_default','1')->first();
        $language->update([
            'number_users'=> $language->getNumberUsers() + 1 ,
        ]);
    }
}
