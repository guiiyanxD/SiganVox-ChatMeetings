<?php

namespace App\Events;

use App\Models\Meet;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserMeetAccess
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Meet $meet;
    public User $user;
    public int $participationType;

    /**
     * Create a new event instance.
     */
    public function __construct(Meet $meet, User $user, $participationType)
    {
        $this->meet = $meet;
        $this->user = $user;
        $this->participationType = $participationType;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
