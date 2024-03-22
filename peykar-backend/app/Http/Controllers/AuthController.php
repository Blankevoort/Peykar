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

    public function checkStatus(Request $request)
    {
        if ($request->email) {
            $userExistsEmail = User::where('email', $request->email)->exists();
        } else if ($request->phone) {
            $userExistsPhone = User::where('phone', $request->phone)->exists();
        }

        if ($userExistsEmail) {
            return response()->json(['status' => 'login', 'email' => $request->email], 200);
        } else {
            return response()->json(['status' => 'register', 'email' => $request->email], 200);
        }

        if ($userExistsPhone) {
            return response()->json(['status' => 'login', 'phone' => $request->phone], 200);
        } else {
            return response()->json(['status' => 'register', 'phone' => $request->phone], 200);
        }
    }

    public function login(UserLoginRequest $request)
    {
        $request->validated($request->only(['email', 'password']));

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return $this->error('', 'Credentials do not match', 401);
        }

        $user = User::where('email', $request->email)->first();

        $user->assignRole('User');

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token')->plainTextToken,
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users,email',
            'email_confirmation' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $user = new User;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->email_confirmation = $request->confirm;
        $user->password = Hash::make($request->password);
        $user->save();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token')->plainTextToken,
        ]);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->success([
            'message' => 'You have succesfully been logged out'
        ]);
    }
}
