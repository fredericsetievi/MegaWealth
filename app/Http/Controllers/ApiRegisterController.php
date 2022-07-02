<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiRegisterController extends Controller
{
    public function authenticateRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $validator->errors()
            ]);
        }else{
            $credentials = [
                'id' => Str::orderedUuid(),
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ];

            User::create($credentials);

            return response()->json([
                'status' => 'Register Success.'
            ]);
        }
    }
}
