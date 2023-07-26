<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
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
            $request->session()->put('loginId', $user->id);
            return redirect()->route('home');

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
        if (Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/');
        }
    }
}
