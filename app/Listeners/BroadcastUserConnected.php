<?php

namespace App\Listeners;

use App\Events\UserConnected;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Broadcast;

class BroadcastUserConnected
{
    public function handle(UserConnected $event)
    {
        Broadcast::to("room.{$event->roomId}")->emit('user-connected', $event->userId);
    }
}