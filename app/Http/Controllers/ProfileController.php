<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        // Get the job and number values from the request body
        $user->phone_number = $request->input('phone_number');
        $user->job = $request->input('job');
        $user->save();

        // Redirect the user to the update profile page
        return redirect('/update-profile-page');
    }

    public function picture(Request $request)
    {
        $user = Auth::user();

        // Validate the file input
        $validatedData = $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Save the file to the public/images directory
        $imageName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('build/assets/images/'), $imageName);

        // Update the user's photo field in the database
        $user->photo = $imageName;
        $user->save();

        // Redirect the user to the update profile page
        return redirect('/update-profile-page');
    }
}
