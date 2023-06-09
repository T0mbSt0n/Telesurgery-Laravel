<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserDisconnected
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $roomId;
    public $userId;

    public function __construct($roomId, $userId)
    {
        $this->roomId = $roomId;
        $this->userId = $userId;
    }

    public function broadcastOn()
    {
        return new PrivateChannel("room.{$this->roomId}");
    }
}