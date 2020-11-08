<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        /**
         * stateless auth
         */
        if(Auth::once($request->only(['email','password'])))
        {
            $user = Auth::user();
            return response()->json(['token' => $user->createToken('token')->plainTextToken], 201);
        }

        return response()->json(['message' => 'You have to authorize first.'], 401);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        /* @var $user \App\Models\User */
        $user = $request->user();
        if($user)
        {
            $user->tokens()->delete();
        }

        return response()->json([], 204);
    }
}
