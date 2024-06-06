<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function index() {
        return view('user.LoginRegisterLogoutProfile.loginUser');
    }

    public function dataUser() {
        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }

    public function login_proses(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'name' => $request->username,
            'password' => $request->password,
        ];

        $remember = true;

        if (Auth::attempt($data, $remember)) {
            return redirect('/');
        } else {
            return redirect()->route('login')->with('failed', 'The Account is Not Registered yet');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have Successfully Logout');
    }

    public function register_proses(Request $request) {
        $request->validate([
            'username' => 'required',
            'nomor' => 'required|numeric',
            'address' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'password.confirmed' => 'Confirm password does not match',
            'nomor.numeric' => 'The phone number must be a number',
        ]);

        $data = [
            'name' => $request->username,
            'number' => $request->nomor,
            'alamat' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        User::create($data);

        $login = [
            'name' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($login)) {
            return redirect('login');
        } else {
            return redirect()->route('register')->with('failed', 'Incorrect Username, Email or Password');
        }
    }
    public function destroy($id): RedirectResponse
    {
        $users = User::withTrashed()->findOrFail($id);
        $users->forceDelete();
        return redirect()->route('user.history')->with('success', 'Data berhasil dihapus secara permanen.');
    }

    public function softDelete($id): RedirectResponse
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('user.history')->with('success', 'Data berhasil dihapus secara lembut.');
    }

    public function onlyTrashUser(): view
    {
        $users = User::onlyTrashed()->latest()->get();
        return view('admin.user.history', compact('users'));
    }

    public function restore($id): RedirectResponse
    {
        $users = User::withTrashed()->findOrFail($id);
        $users->restore();
        return redirect()->route('user.history')->with('success', 'Data berhasil dipulihkan.');
    }
}
