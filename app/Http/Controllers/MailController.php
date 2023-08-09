<?php

namespace App\Http\Controllers;

use App\Mail\ExampleMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function index(Request $request)
    {


        $mailData = [
            'title' => 'Mail from Admin Panel',
            'body' => 'This mail is sent for password change',
            'username' => $request->username,
        ];

        Mail::to($request->mail)->send(new ExampleMail($mailData));

        return redirect()->route('login')->with(['message' => 'Email sent to your mail']);
    }
}
