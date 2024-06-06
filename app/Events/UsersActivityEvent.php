<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UsersActivityEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $email;
    public $type;
    public $ip;
    public $connection;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email, $type, $ip, $connection)
    {
        $this->email = $email;
        $this->type = $type;
        $this->ip = $ip;
        $this->connection = $connection;
    }

}
