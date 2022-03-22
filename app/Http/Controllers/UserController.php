<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUser(){
        return response()->json(User::all(), 200);
    }

    public function getUserById($email){
        $user = User::find($email);
        if(is_null($email)){
            return response()->json(['message' => 'User Not Found'], 404);
        }
        return response()->json($user::find($email), 200);
    }

    public function addUser(Request $request){
        $validatedData = $request->validate([
            'id' => 'numeric',
            'name' => 'required|alpha|max:100',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:4'
        ]);

        $user = User::create($validatedData);
        return response($user, 201);
    }

    public function updateUserById(Request $request, $id){
        $user = User::find($id);
        if (is_null($user)){
            return response()->json(['message'=> 'User Not Found'], 404);
        }
        $user -> update($request->all());
        return response($user, 200);
    }

    public function deleteUserById(Request $request, $id){
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(['message' => 'User Not Found'], 404);
        }
        $user ->delete();
        return response()->json(null, 204);
    }
}
