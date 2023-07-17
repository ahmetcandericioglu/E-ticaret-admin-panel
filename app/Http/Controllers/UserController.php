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
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', '=', $request->username)->first();
        if ($user) {
            if ($user->password != $request->password) {
                echo 'Wrong password';
                return;
            }
            return view('homepage');
        }
        echo "There is no user with name '" . $request->username . "'";
        return;
    }

    public function toUser()
    {
        return view('userpage');
    }

    public function toRegister()
    {
        return view('user_registerpage');
    }

    public function registerControl(Request $request)
    {
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

    public function toUserList()
    {
        $users = User::all();
        return view('user_listpage', ["users" => $users]);
    }

    public function toUpdateUser(User $user)
    {
        return view('user_editpage', ['user' => $user]);
    }

    public function toDeleteUser(User $user)
    {
        return view('user_deletepage', ['user' => $user]);
    }

    public function editUser(Request $request, User $user)
    {

        $request->validate([
            "username_edit" => 'required|alpha:ascii',
            "usertitle_edit" => 'required',
        ]);

        if (!($request->username_edit == $user->username)) {
            $duplicate = User::where('username', '=', $request->username_edit)->first();
            if ($request->username_edit)
                if (!($duplicate == "")) {
                    echo "Username already taken";
                    return;
                }
        }
        $passwordChange = false;
        if (!($request->password_edit == "")) {
            $passwordChange = true;
            $request->validate([
                "password_edit" => 'min:6',
            ]);
        }
        if ($passwordChange) {
            $user->usertitle = $request->usertitle_edit;
            $user->username = $request->username_edit;
            $user->password = $request->password_edit;
            $user->save();

        } else {
            $user->usertitle = $request->usertitle_edit;
            $user->username = $request->username_edit;
            $user->save();
        }


        return view('user_editpage', ['user' => $user]);

    }

    public function deleteUser(User $user){
        $user->delete();
        return redirect()->route('userlist');
    }

    public function deleteUsers(Request $request){
        $ids = $request->selectedids;
        User::whereIn('id', $ids)->delete();
        return redirect()->route('userlist');
    }
}
