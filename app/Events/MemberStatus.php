<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MemberStatus implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $member, $status;
    /**
     * Create a new event instance.
     */
    public function __construct($member, $status)
    {
        $this->member = $member;
        $this->status = $status;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     *
     */
    public function broadcastOn()
    {
        return new Channel('notifications');
    }

    public function broadcastAs()
    {
        return 'member-login';
    }
}
