<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

use App\Models\User;

class AuthController extends Controller
{
    public function signIn(Request $request) 
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|min:5',
            'password' => 'required|min:8',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if ($validation->fails()) 
        {
            return response()->json($validation->errors(), 400);
        }

        if (auth()->attempt($data)) 
        {
            $token = auth()->user()->createToken('prototech-test-app')->accessToken;
            return response()->json([
                'data' => auth()->user(),
                'metadata' => [
                    'access_token' => $token,
                ]
            ], 200);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function signUp(Request $request) 
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|min:4|max:15',
            'email' => 'required|min:5',
            'password' => 'required|min:8',
        ]);

        if ($validation->fails()) 
        {
            return response()->json($validation->errors(), 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('prototech-test-app')->accessToken;

        return response()->json([
            'data' => $user,
            'metadata' => [
                'access_token' => $token,
            ],
        ], 200);
    }
}
