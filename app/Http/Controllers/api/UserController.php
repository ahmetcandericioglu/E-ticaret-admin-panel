<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'usertitle' => 'required',
            'username' => 'required|unique:users|alpha:ascii',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json($validator->errors(), 422));
        }

        User::create([
            'username' => $request->username,
            'usertitle' => $request->usertitle,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user)
            return response()->json(['message' => 'There is no user with this id']);

        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user)
            return response()->json(['message' => 'There is no user with this id']);

        $validator = Validator::make($request->all(), [
            'usertitle' => 'required',
            'username' => 'required|alpha:ascii|unique:users,username,'.$id,
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json($validator->errors(), 422));
        }

        $user->username = $request->username;
        $user->usertitle = $request->usertitle;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'User updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user)
            return response()->json(['message' => 'There is no user with this id']);

        User::destroy($id);
        return response()->json(["message" => "User deleted successfully"]);
    }

    public function destroySelected($ids)
    {
        $ids = explode(",",$ids);
        User::whereIn("id",$ids)->delete();
        return response()->json(['message' => 'Selected users deleted successfully']);
    }
}
