<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //
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
