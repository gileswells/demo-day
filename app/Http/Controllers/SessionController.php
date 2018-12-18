<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function register()
    {
        return view('session.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);

        $admin = Admin::create($validatedData);

        $request->session()->flash('registration-complete', true);

        return redirect()->route('session.login');
    }

    public function login()
    {
        return view('session.login');
    }

    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:admins',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $validatedData['email'])->first();

        if (Hash::check($validatedData['password'], $admin->password)) {
            $request->session()->push('admin_id', $admin->id);
            $request->session()->flash('login-success', true);

            return redirect()->route('leads.index');
        } else {
            $request->session()->flash('login-failure', true);

            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_id');
        $request->session()->flash('logout-success', true);

        return redirect()->route('session.login');
    }
}
