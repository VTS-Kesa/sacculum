<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number
        ]);
        $user->save();

        return redirect()->back()->with('message', 'Profile updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8']
        ]);

        $user = Auth::user();
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        $user->save();

        return redirect()->back()->with('message', 'Password updated successfully');
    }
}
