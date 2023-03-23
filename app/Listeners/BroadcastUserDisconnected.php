<?php

namespace App\Listeners;

use App\Events\UserDisconnected;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Broadcast;

class BroadcastUserDisconnected
{
    public function handle(UserDisconnected $event)
    {
        Broadcast::to("room.{$event->roomId}")->emit('user-disconnected', $event->userId);
    }
}