<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserLoginRequest;

class AuthController extends Controller
{
    use HttpResponses;

    public function loginOrRegister(Request $request)
    {
        $userExists = User::where('email', $request->email)->exists();

        if ($userExists) {
            return response()->json(['status' => 'login', 'email' => $request->email], 200);
        } else {
            return response()->json(['status' => 'register', 'email' => $request->email], 200);
        }
    }

    public function login(UserLoginRequest $request)
    {
        $request->validated();

        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('', 'Credentials do not match', 401);
        }

        $user = Auth::user();

        $user->assignRole('User');

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token')->plainTextToken,
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['status' => 204], 204);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->success([
            'message' => 'You have succesfully been logged out'
        ]);
    }
}
