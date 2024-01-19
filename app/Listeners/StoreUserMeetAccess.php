<?php

namespace App\Listeners;

use App\Events\UserMeetAccess;
use App\Models\UserMeet;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreUserMeetAccess
{
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
    public function handle(UserMeetAccess $event)
    {
        return UserMeet::create([
            'user_id' => $event->user->id,
            'meet_id' => $event->meet->id,
            'participation_type_id' => $event->participationType,
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}
