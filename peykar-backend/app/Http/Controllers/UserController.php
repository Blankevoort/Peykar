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
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $user = User::findOrFail($id);

        $user->name = $validatedData['name'];
        $user->save();

        return response()->json(['message' => 'User name updated successfully'], 204);
    }

    public function destroy($id)
    {
        //
    }
}
