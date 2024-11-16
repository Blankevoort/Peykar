<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserProfileResource;
use Illuminate\Support\Facades\Auth;

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
        ]);

        return new UserProfileResource($user);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        $validatedData = $request->validate([
            'name' => ['nullable', 'string', 'max:120'],
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

        $userFields = ['name', 'phone'];
        $profileFields = [
            'birth', 'region', 'city', 'disability', 'expectedSalary',
            'foreigners', 'gender', 'preferredJob', 'maritalStatus', 'militaryServiceStatus'
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
}
