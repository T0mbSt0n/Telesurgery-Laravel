<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingRoom extends Model
{
    protected $table = 'meeting_rooms';

    /**
     * Create a new meeting room with the specified name.
     *
     * @param string $name The name of the meeting room
     * @return MeetingRoom The newly created meeting room
     */
    public static function createRoom($name)
    {
        $room = new self;
        $room->name = $name;
        $room->save();

        return $room;
    }

    /**
     * Find the meeting room with the specified name.
     *
     * @param string $name The name of the meeting room
     * @return MeetingRoom|null The meeting room with the specified name, or null if it doesn't exist
     */
    public static function findRoomByName($name)
    {
        return self::where('name', $name)->first();
    }

    protected $fillable = [
        'name',
    ];
}