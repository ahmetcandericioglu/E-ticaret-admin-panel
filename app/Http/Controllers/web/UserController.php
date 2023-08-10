<?php

namespace App\Http\Controllers\web;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function toUser()
    {
        return view('user/userpage');
    }

    public function toRegister()
    {
        return view('user/user_registerpage');
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
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('userlist');
    }

    public function toUserList()
    {
        $users = User::all();
        return view('user/user_listpage', ["users" => $users]);
    }

    public function toUpdateUser(User $user)
    {
        return view('user/user_editpage', ['user' => $user]);
    }

    public function toDeleteUser(User $user)
    {
        return view('user/user_deletepage', ['user' => $user]);
    }

    public function editUser(Request $request, User $user)
    {

        $request->validate([
            "username" => 'required|alpha:ascii',
            "usertitle_edit" => 'required',
        ]);

        if (!($request->username == $user->username)) {
            $duplicate = User::where('username', '=', $request->username)->first();
            if ($request->username)
                if (!($duplicate == "")) {
                    $request->validate([
                        "username" => "unique:users",
                    ]);
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
            $user->username = $request->username;
            $user->password = Hash::make($request->password_edit);
            $user->save();

        } else {
            $user->usertitle = $request->usertitle_edit;
            $user->username = $request->username;
            $user->save();
        }


        return view('user/user_editpage', ['user' => $user]);

    }

    public function deleteUser(User $user){
        $user->delete();
        return redirect()->route('userlist');
    }

    public function deleteUsers(Request $request){
        $ids = $request->selectedids;
        if (!($ids == null))
        User::whereIn('id', $ids)->delete();
        return redirect()->route('userlist');
    }
}