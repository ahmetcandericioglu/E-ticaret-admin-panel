<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
            if ($user->password != $request->password){
                echo 'Wrong password';
                return;
            }
            return view('homepage');
        }
        echo "There is no user with name '". $request->username . "'";
        return;
    }

    public function toUser(){
        return view('userpage');
    }
    public function toRegister(){
        return view('user_registerpage');
    }

    public function registerControl(Request $request){
        $request->validate([
            "username" => 'required|alpha:ascii|unique:users',
            "password" => 'required|min:6',
            "usertitle" => 'required',
        ]);

        User::create([
            'usertitle' => $request->usertitle,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return view('user_registerpage');
    }

    public function toUserList(){
        $users = User::all();
        return view('user_listpage', ["users" => $users]);
    }

    public function toUpdateUser(User $user){
        return view('user_editpage', ['user' => $user]);
    }

    public function toDeleteUser(user $user){
        return view('user_deletepage', ['user' => $user]);
    }
}
