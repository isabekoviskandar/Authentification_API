<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        Auth::attempt($request->only('email', 'password'));

        if (Auth::check()) {
            $token = Auth::user()->createToken('auth_token')->plainTextToken;

            return response()->json([
                'success' => true,
                'data' => Auth::user(),
                'token' => $token,
            ], 200);
        }
        return response()->json([   
           'success' => false,
           'message' => 'Unauthorized'
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'user',
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'data' => $user,
            'token' => $token
        ], 200);
    }
}
