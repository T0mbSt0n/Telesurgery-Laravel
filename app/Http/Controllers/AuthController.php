<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Request\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginView()
    {
        return view('login.main', [
            'layout' => 'login'
        ]);
    }

    public function registerView()
    {

        return view('login.main',[
            'layout'=> 'register'
        ]);
    }

    public function register_action(Request $request)
    {

        // Save the validated data to the database
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'role' => 'required|in:admin,user',
        ]);
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = $validatedData['role'] ?? 'user';
        $user->save();
        
        if ($user) {
            // Flash a success message to the session
            $request->session()->flash('success', 'User has been added');
        } else {
            // Flash a failure message to the session
            $request->session()->flash('failure', 'Adding user failed');
        }
        return view('pages.add-users');
    }

    /**
     * Authenticate login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        if (!\Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            throw new \Exception('Wrong email or password.');
        }
    }

    /**
     * Logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        \Auth::logout();
        return redirect('login');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        $user = User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        if ($user) {
            // Flash a success message to the session
            $request->session()->flash('success', 'Password Update successful');
        } else {
            // Flash a failure message to the session
            $request->session()->flash('failure', 'Password Update failed');
        }

        return back()->with("status", "Password changed successfully!");
}
}
