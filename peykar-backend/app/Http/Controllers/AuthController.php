<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;

class AuthController extends Controller
{
    use HttpResponses;

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

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->success([
            'message' => 'You have succesfully been logged out'
        ]);
    }
}
