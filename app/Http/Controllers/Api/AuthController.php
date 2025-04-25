<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            // Validate the request
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = $request->user()->createToken('API Token');

                return response()->json([
                    'token' => $token->plainTextToken,
                    'type' => 'Bearer',
                    'expires_at' => $token->accessToken->expires_at,
                ], 200);
            }

            return response()->json(['code' => 401, 'error' => 'Unauthorized'], 401);

        } catch (Exception $e) {
            return response()->json(['code' => 500, 'error' => $e->getMessage()], 500);
        }
    }
}