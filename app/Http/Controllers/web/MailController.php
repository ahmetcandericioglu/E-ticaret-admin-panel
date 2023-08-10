<?php

namespace App\Http\Controllers\web;

use App\Mail\ExampleMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MailController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('username','=',$request->username)->first();
        if ($user){
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($request->mail)->send(new ExampleMail($user));
            return redirect()->back()->with(['success' => 'Email sent to your mail']);
        }

        return redirect()->back()->with(['error' => 'There is no user with this username']);

    }

    public function toReset($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        return view('resetpassword', ['user' => $user]);
    }

    public function reset(Request $request, $id)
    {

        $changeUser = User::find($id);

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
            'password_again' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with(['error' => 'Invalid password!']);
        }

        if ($request->password == $request->password_again){
            $changeUser->password = Hash::make($request->password);
            $changeUser->save();
            return view('success');
        }

        return redirect()->back()->with(['error' => 'Passwords do not match']);

    }
}
