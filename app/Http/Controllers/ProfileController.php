<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        if ($user) {
            return view('User.LoginRegisterLogoutProfile.profileUser', compact('user'));
        }

        return redirect()->route('login');
    }

    public function update(Request $request) {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255',
            'nomor' => 'required|numeric',
            'address' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ], [
            'nomor.numeric' => 'The phone number must be a number',
        ]);

        $user->update([
            'name' => $request->username,
            'number' => $request->nomor,
            'alamat' => $request->address,
            'email' => $request->email,
        ]);

        return redirect()->route('profile-show')->with('success', 'Profile updated successfully.');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('dashboard.index')->with('success', 'You have successfully logged out.');
    }
}
