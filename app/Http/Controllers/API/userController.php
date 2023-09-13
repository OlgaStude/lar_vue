<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginReques;
use App\Http\Requests\loginRequest;
use App\Http\Requests\registrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function register(Request $req)
    {

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);

        if ($user) {

            return response()->json(['status' => 200, 'message' => 'new person is added']);
        }
    }


    public function login(loginReques $req)
    {

        $user = [
            'email' => $req->email,
            'password' => $req->password
        ];

        if (Auth::attempt($user)) {
            return response()->json(['status' => 200, 'message' => 'user logged in']);
        }

        return response()->json(['status' => 400, 'message' => 'user didn\'t log in']);
    }
}
