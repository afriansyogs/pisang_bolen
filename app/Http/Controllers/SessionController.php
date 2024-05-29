<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function index() {
        return view('user.LoginRegisterLogoutProfile.login');
    }



    public function dataUser() {
        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }

    public function create() {
        return view('admin.user.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        // Hash password before saving
        $userData = $request->all();
        $userData['password'] = bcrypt($request->password);
    
        User::create($userData);
    
        return redirect()->route('userList')->with('success', 'User created successfully.');
    }
    

    public function edit($id) {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('userList')->with('success', 'User updated successfully.');
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('userList')->with('success', 'User deleted successfully.');
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

        if(Auth::attempt($data, $remember)) {
            return redirect('/');
        } else {
            return redirect()->route('login')-> with('failed', 'The Account is Not Registered yet');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have Successfully Logout');
    }

    public function register() {
        return view('user.LoginRegisterLogoutProfile.register');
    }

    public function register_proses(Request $request) {
        $request->validate([
            'username' => 'required',
            'nomor' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'password.confirmed' => 'Confirm password does not match',
        ]);

        $data['name'] = $request->username;
        $data['number'] = $request->nomor;
        $data['alamat'] = $request->address;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);


        User::create($data);

        $login = [
            'name' => $request->username,
            'password' => $request->password,
        ];

        if(Auth::attempt($login)) {
            return redirect('/login');
        } else {
            return redirect()->route('register')-> with('failed', 'Incorrect Username, Email or Password');
        }
    }
}
