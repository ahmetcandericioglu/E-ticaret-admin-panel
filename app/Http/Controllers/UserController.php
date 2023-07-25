<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('loginpage');
    }

    public function loginControl(Request $request)
    {
        $request->validate([
            'username'=> 'required|exists:users',
            'password'=> 'required',
        ]);

        $user = User::where('username', '=', $request->username)->first();
        if ($user){
            if (!(Hash::check($request->password, $user->password))) {
                $request->validate([
                    'password' => 'current_password',
                ]);
                redirect()->route("login");
            }
            Auth::login($user);
            return view('homepage');
        }
        return view('loginpage');
    }
}
