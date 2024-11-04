<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        ]);

        return new UserProfileResource($user);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['sometimes', 'string', 'max:120'],
            'phone' => ['sometimes', 'phone', 'max:11'],
            'email' => ['sometimes', 'email', 'max:255'],
            'jobTitle' => ['sometimes', 'string', 'max:255'],
            'linkedIn' => ['sometimes', 'string', 'max:255'],
        ]);

        foreach ($validatedData as $key => $value) {
            $user->$key = $value;
        }

        $user->save();

        return response()->json(['message' => 'User updated successfully'], 204);
    }

    public function destroy($id)
    {
        //
    }
}
