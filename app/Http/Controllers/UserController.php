<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Start Auth
    public function register()
    {
        return view('auth.register');
    }

    public function register_request(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:3|max:15',
            'email' => 'required|string|email|unique:users,email|',
            'password' => 'required|min:4|string|max:20'
        ]);

        $token = Str::random(32);
        if (User::count() == 0) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'token' => $token,
                'admin' => 1,
                'password' => bcrypt($request->password)
            ]);
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'token' => $token,
                'password' => bcrypt($request->password)
            ]);
        }
        return redirect('login');
    }
    public function login()
    {
        return view('auth.login');
    }

    public function login_request(Request $request)
    {

        // dd($request);
        $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|min:4|string|max:20'
        ]);

        if (Auth::attempt($request->except('_token'))) {
            return redirect('home');
        }
        return redirect('login');
    }
    // End Auth
    // Start Crud
    public function home()
    {
        $users = User::all();
        return view('crud.home', compact('users'));
    }

    public function create()
    {
        return view('crud.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:3|max:15',
            'email' => 'required|string|email|unique:users,email|',
            'password' => 'required|min:4|string|max:20'
        ]);

        $token = Str::random(32);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'token' => $token,
            'admin' => $request->admin,
            'password' => bcrypt($request->password)
        ]);

        session()->flash('create_message', 'Create Success');
        return redirect('home');
    }

    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('crud.edit', compact('user'));
    }
    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:3|max:15',
            'email' => 'required|string|email|',
        ]);

        $user = User::findorfail($request->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'admin' => $request->admin,
        ]);

        session()->flash('update_message', 'Update Success');
        return redirect('home');
    }

    public function delete($id)
    {
        User::destroy($id);
        session()->flash('delete_message', 'Delete Success');
        return redirect('home');
    }

    public function logout()
    {
        auth::logout();
        return redirect('login');
    }
    // End Crud
}
