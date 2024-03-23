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
        $userExistsEmail = false;
        $userExistsPhone = false;

        if ($request->emailPhone) {
            $userExistsEmail = User::where('email', $request->emailPhone)->exists();
        } elseif ($request->emailPhone) {
            $userExistsPhone = User::where('phone', $request->emailPhone)->exists();
        } elseif ($request->emailPhone) {
            if (User::where('phone', $request->emailPhone)->exists()) {
                return response()->json(['status' => 'login', 'phone' => ""], 200);
            }

            if (User::where('email', $request->emailPhone)->exists()) {
                return response()->json(['status' => 'login', 'email' => ""], 200);
            }
        }

        if ($userExistsEmail) {
            return response()->json(['status' => 'login', 'email' => ""], 200);
        } elseif ($userExistsPhone) {
            return response()->json(['status' => 'login', 'phone' => ""], 200);
        } elseif (!$userExistsPhone) {
            return response()->json(['status' => 'register', 'email' => ""], 200);
        } else {
            return response()->json(['status' => 'register', 'phone' => ""], 200);
        }
    }


    public function login(UserLoginRequest $request)
    {
        $request->validated();

        $identifier = $request->input('emailPhone');
        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            $credentials = ['email' => $identifier, 'password' => $request->input('password')];
        } else {
            $credentials = ['phone' => $identifier, 'password' => $request->input('password')];
        }

        if (!Auth::attempt($credentials)) {
            return $this->error('', 'Credentials do not match', 401);
        }

        $user = Auth::user();
        $user->assignRole('User');

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token')->plainTextToken,
        ]);
    }

    public function checkDuplicate(Request $request)
    {
        $userExistsEmail = User::where('email', $request->emailPhone)->exists();
        $userExistsPhone = User::where('phone', $request->emailPhone)->exists();

        if ($userExistsEmail && $userExistsPhone) {
            return response()->json(['status' => 409], 200);
        } elseif ($userExistsEmail) {
            return response()->json(['status' => 409, 'email' => ''], 200);
        } elseif ($userExistsPhone) {
            return response()->json(['status' => 409, 'phone' => ''], 200);
        } else if (!$userExistsEmail && !$userExistsPhone) {
            return response()->json(['status' => 'ok'], 200);
        }
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
        $user->email_confirmation = $request->email_confirmation;
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
