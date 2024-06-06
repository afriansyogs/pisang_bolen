<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index() {
        $users = User::latest()->get();
        return view('admin.user.index', compact('users'));
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
