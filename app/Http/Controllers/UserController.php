<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    public function register(RegisterRequest $request)
    {

        $userInput = $request->all();
        $hashedPassword = Hash::make($userInput['password']);

         // Create the user record
        $user = User::create([
            'name' => $userInput['name'],
            'email' => $userInput['email'],
            'password' => $hashedPassword,
        ]);
        
        // Create token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success'   => true,
            'message'   => 'Registration comleted',
            'data'      => [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ]
        ]);

        //dd($validatedData);

        // $validatedData['password'] = Hash::make($validatedData['password']);

        // $user = User::create($validatedData);

        // $token = $user->createToken('auth_token')->plainTextToken;

        // return response()->json([
        //     'access_token' => $token,
        //     'token_type' => 'Bearer',
        // ]);
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'email|required|max:255',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
