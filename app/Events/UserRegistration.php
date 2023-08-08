<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserRegistration implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $action;
    /**
     * Create a new event instance.
     */
    public function __construct($action)
    {
        $this->action = $action;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return
     */
    public function broadcastOn()
    {
        return new Channel('notifications');
    }

    public function broadcastAs()
    {
        if ($this->action == 'regiter') {
            return 'user-register';
        } else {
            return 'orders';
        }
    }
}
