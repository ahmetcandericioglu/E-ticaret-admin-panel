<?php

namespace App\Http\Controllers\web;
use App\Http\Controllers\web\Controller;
use App\Models\User;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        return view('user.profile',['user' => $user]);
    }

    public function saveImage(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,',
        ]);
        $user = User::find($id);

        $image_name = $user->username.'.'.$request->image->extension();
        $request->image->move(public_path('images'),$image_name);
        return redirect()->back();
    }
}
