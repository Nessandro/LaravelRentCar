<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //

    public function login(Request $request)
    {
        if(Auth::attempt($request->only(['email','password'])))
        {
            $user = Auth::user();

            return response()->json([
                'token' => $user->createToken('token')->plainTextToken
            ]);
        }

        return response()->json([
            'message' => 'You have to authorize first.'
        ], 401);
    }

    public function logout()
    {

    }
}
