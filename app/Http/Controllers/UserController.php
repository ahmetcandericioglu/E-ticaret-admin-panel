<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
            'username'=> 'required',
            'password'=> 'required',
        ]);

        $user = User::where('username', '=', $request->username)->first();
        if ($user){
            if (!(Hash::check($request->password, $user->password))){
                echo 'Wrong password';
                return;
            }
            return view('homepage');
        }
        echo "There is no user with name '". $request->username . "'";
        return;
    }
}
