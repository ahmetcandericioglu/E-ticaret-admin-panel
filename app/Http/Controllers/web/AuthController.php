<?php

namespace App\Http\Controllers\web;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('loginpage');
    }
    public function loginControl(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users',
            'password' => 'required',
        ]);
        $user = User::where('username', '=', $request->username)->first();
        if ($user) {
            if (!(Hash::check($request->password, $user->password))) {
                $request->validate([
                    'password' => 'current_password',
                ]);
                redirect()->route("login");
            }
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                return redirect()->route('home');
            }
            //$request->session()->put('loginId', $user->id);


            /*$credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return  redirect()->route('home');
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');*/
        }
        return view('loginpage');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');

    }
}
