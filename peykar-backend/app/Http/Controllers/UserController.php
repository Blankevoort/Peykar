<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserProfileResource;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user()->load([
            'profile',
            'profile.socials',
            'profile.activities',
            'profile.academicexps',
            'profile.softwareskills',
            'profile.awards',
            'profile.books',
            'profile.courses',
            'profile.langs',
            'profile.skills',
            'profile.colleagues',
            'profile.educations',
            'profile.workExperience',
            'profile.portfolio',
        ]);

        return new UserProfileResource($user);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        $validatedData = $request->validate([
            'name' => ['nullable', 'string', 'max:120'],
            'jobTitle' => ['nullable', 'string', 'max:120'],
            'linkedIn' => ['nullable', 'string', 'max:256'],
            'phone' => ['nullable', 'string', 'max:15'],
            'birth' => ['nullable', 'date'],
            'region' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'disability' => ['nullable', 'string', 'max:255'],
            'expectedSalary' => ['nullable', 'string', 'max:255'],
            'foreigners' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', 'string', 'max:10'],
            'preferredJob' => ['nullable', 'string', 'max:255'],
            'maritalStatus' => ['nullable', 'string', 'max:255'],
            'militaryServiceStatus' => ['nullable', 'string', 'max:255'],
        ]);

        $userFields = ['name', 'phone', 'jobTitle', 'linkedIn'];
        $profileFields = [
            'birth',
            'region',
            'city',
            'disability',
            'expectedSalary',
            'foreigners',
            'gender',
            'preferredJob',
            'maritalStatus',
            'militaryServiceStatus'
        ];

        foreach ($userFields as $field) {
            if ($request->filled($field)) {
                $user->$field = $validatedData[$field];
            }
        }

        foreach ($profileFields as $field) {
            if ($request->filled($field)) {
                $profile->$field = $validatedData[$field];
            }
        }

        $user->isDirty() && $user->save();
        $profile->isDirty() && $profile->save();

        return response()->json(['message' => 'User and Profile updated successfully'], 204);
    }

    function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'emailRepetition' => 'required|email|same:email',
            'password' => 'required',
        ]);

        $user = auth()->user();

        if ($user->email === $request->email) {
            return response()->json([
                'message' => 'The new email cannot be the same as the current email.',
            ], 422);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'The provided password is incorrect.',
            ], 401);
        }

        $user->email = $request->email;
        $user->save();

        return response()->json(['status' => 204]);
    }
}
