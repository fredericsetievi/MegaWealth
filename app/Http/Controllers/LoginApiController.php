<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginApiController extends Controller
{
    public function authenticateLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('Bearer Token')->accessToken;

            return response()->json([
                'status' => 'Login Success.',
                'Token' => $token,
            ]);
        } else {
            return response()->json([
                'status' => 'Login Failed',
            ]);
        }
    }
}
