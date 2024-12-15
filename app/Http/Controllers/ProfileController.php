<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        // Assuming you're passing user data to the profile view
        $user = auth()->user(); // Get the authenticated user

        return view('profile', compact('user'));
    }
}
