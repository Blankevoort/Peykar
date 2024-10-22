<?php

namespace App\Http\Controllers;

use App\Models\Software;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class SoftwareController extends Controller
{
    use HttpResponses;

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'proficiency' => 'required|string',
            'condition_id' => 'required|exists:conditions,id'
        ]);

        Software::create([
            'name' => $validated['name'],
            'proficiency' => $validated['proficiency'],
            'condition_id' => $validated['condition_id'],
        ]);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, Software $software)
    {
        if (Auth::user()->id !== $software->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }

        $software->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(Software $software)
    {
        return $this->isNotAuthorized($software) ? $this->isNotAuthorized($software) : $software->delete();
    }

    private function isNotAuthorized($software)
    {
        if (Auth::user()->id !== $software->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
