<?php

namespace App\Http\Controllers;

use App\Models\MeetingRoom;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MeetingController extends Controller
{
    public function handleMeetingRoom(Request $request)
    {
        $roomName = $request->input('room_name');
    
        // Try to find an existing meeting room with the given name
        $room = MeetingRoom::where('name', $roomName)->first();
    
        if (!$room) {
            // If the room doesn't exist, create a new one
            $room = MeetingRoom::create(['name' => $roomName]);
        }
    
        // Redirect the user to the appropriate URL for the meeting room
        return redirect('/meeting/' . urlencode($room->name));
    }
    public function streamMeetingRoom($roomName)
    {
        return view('meeting.stream', compact('roomName'));
        
    }
}
