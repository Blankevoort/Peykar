<?php

namespace App\Http\Controllers;

use App\Models\NeededSkill;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class NeededSkillController extends Controller
{
    use HttpResponses;

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        NeededSkill::create([
            'name' => $request->name,
            'level' => $request->level,
        ]);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, NeededSkill $needed)
    {
        if (Auth::user()->id !== $needed->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }

        $needed->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(NeededSkill $needed)
    {
        return $this->isNotAuthorized($needed) ? $this->isNotAuthorized($needed) : $needed->delete();
    }

    private function isNotAuthorized($needed)
    {
        if (Auth::user()->id !== $needed->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
