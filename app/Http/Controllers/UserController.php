<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Validator;

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
            'phone' => $userInput['phone'],
            'password' => $hashedPassword,
        ]);
        
        // Create token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success'   => true,
            'message'   => 'Registration completed successfully',
            'data'      => [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ]
        ]);
    }

    public function login(Request $request)
    {
        // I could use the a separate validation method but I wanted to keep it simple because I learning new things by that project. So let's test another way to do it 🔥.
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:50',
            'password' => 'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'message'   => 'Validation errors',
                'data'      => $validator->errors()
            ], 400);
        }
 
        $validated = $validator->validated();

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'success'   => false,
                'message'   => 'Your credentials are incorrect',
                'data'      => []
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success'   => true,
            'message'   => 'Login successful',
            'data'      => [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ]
        ]);
    }
}
