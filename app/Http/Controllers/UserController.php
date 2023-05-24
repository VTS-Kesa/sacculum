<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();
        $users = User::where('id', '!=', $currentUser->id)->get();

        return view('users.index')->with('users', $users);
    }

    public function ban(Request $request)
    {
        $user = User::findOrFail($request->id);

        $user->update([
            'banned' => true,
        ]);

        return back()->with('message', 'User banned successfully.');
    }

    public function unban(Request $request)
    {
        $user = User::findOrFail($request->id);

        $user->update([
            'banned' => false,
        ]);

        return back()->with('message', 'User unbanned successfully.');
    }
}
