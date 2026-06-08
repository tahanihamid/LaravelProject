<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    // Show user profile page
    public function index()
    {
        $user = Auth::user();
        return view('account.index', compact('user'));
    }

    // Show edit form
    public function edit($id)
    {
        $user = Auth::user();
        return view('account.edit', compact('user'));
    }

    // Update user name
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->save();

        return redirect()->route('account.index')
            ->with('success', 'Profile updated!');
    }
}