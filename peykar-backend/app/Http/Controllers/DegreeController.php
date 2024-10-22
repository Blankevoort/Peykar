<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class DegreeController extends Controller
{
    use HttpResponses;

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'field' => 'required|string',
            'proficiency' => 'required|string',
            'condition_id' => 'required|exists:conditions,id'
        ]);

        Degree::create([
            'field' => $validated['field'],
            'proficiency' => $validated['proficiency'],
            'condition_id' => $validated['condition_id'],
        ]);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, Degree $degree)
    {
        if (Auth::user()->id !== $degree->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }

        $degree->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(Degree $degree)
    {
        return $this->isNotAuthorized($degree) ? $this->isNotAuthorized($degree) : $degree->delete();
    }

    private function isNotAuthorized($degree)
    {
        if (Auth::user()->id !== $degree->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
