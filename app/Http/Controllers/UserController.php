<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Show add user form
    public function showAddUserForm()
    {
        return view('1st_admin.actions.add_user');
    }

   // Store user data
public function store_User(Request $request)
{
    // Validate request data
    $request->validate([
        'name' => 'required|string',
        'username' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|string|min:8',
        'admin' => 'required|numeric',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
    ]);

    // Handle file upload if a photo is provided
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
    } else {
        $photoPath = null;
    }

    // Create a new User instance
    $user = new User([
        'name' => $request->input('name'),
        'username' => $request->input('username'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'admin' => $request->input('admin'),
        'photo' => $photoPath,
    ]);

    // Save the User instance to the database
    $user->save();

    // Redirect back or to a specific route after successful storage
    return redirect()->route('user.showAddForm')->with('success', 'User added successfully!');
}

}
