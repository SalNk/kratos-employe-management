<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function handleLogin(UserRequest $request)
    {
        // $credentials = $request->only(['email', 'password']);
        // if (Auth::attempt($credentials)) {
        //     return redirect()->route('dashbord');
        // } else {
        //     return redirect()->back();
        // }

        if ($request) {
            return redirect()->route('dashbord');
        } else {
            return redirect()->back();
        }
    }
    public function handleRegister(UserRequest $request)
    {
        // dd($request);
        

        if ($request) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return redirect()->route('dashbord');
        } else {
            return redirect()->back();
        }
    }
}