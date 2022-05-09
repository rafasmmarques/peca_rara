<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),
        ]);

        $token = $user->createToken('mytoken')->plainTextToken;

        return response(['user' => $user, 'token' => $token], Response::HTTP_CREATED);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if(!$user || !Hash::check($credentials['password'], $user->password)){
            return response(['message' => 'Invalid credentials'], Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('mytoken')->plainTextToken;

        return response(['user' => $user, 'token' => $token], Response::HTTP_OK);
    }

    public function logout()
    {
        auth()->user()->tokens()->each(function ($token, $key) {
            $token->delete();
        });

        return response(['message' => 'Successfully logged out']);
    }

}
