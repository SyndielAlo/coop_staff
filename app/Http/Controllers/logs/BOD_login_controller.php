<?php

namespace App\Http\Controllers\logs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BOD_login_controller extends Controller
{
    public function bodLogin(){
        return view('auth.BOD_login');
    }

    public function authenticate(Request $request)
{
    // Retrieve and validate the username and password from the form
    $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    // Attempt to authenticate the user
    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Redirect based on admin status
        if ($user->admin == 1) {
            return redirect()->route('1st_admin.dashboard');
        } elseif ($user->admin == 0) {
            return redirect()->route('1st_admin.BOD (view only).BOD_dashboard');
        }
    }

    // If authentication fails or user not authorized, redirect to welcome with an error message
    return redirect()->route('welcome')->with('error', 'Invalid credentials or user not authorized');
}

public function logout()
{
    Auth::logout();

    // Redirect to the welcome page or any other page you prefer after logout
    return redirect()->route('welcome');
}
}
