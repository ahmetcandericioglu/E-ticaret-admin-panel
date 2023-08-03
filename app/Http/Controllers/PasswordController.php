<?php

namespace App\Http\Controllers;

use App\Mail\ExampleMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function toPassword()
    {
        return view('forgetpasswordpage');
    }

    public function sendMail()
    {
        Mail::to('4hcan2001@gmail.com')->send(new ExampleMail());
        return redirect('/');
    }
}
