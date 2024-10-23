<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\Profile\skills;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SkillsController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return skills::with('profiles')->get();
    }

    public function store(Request $request)
    {
        $profile = Profile::where('user_id', Auth::user()->id)->firstOrFail();

        skills::create([
            'name' => $request->name,
            'level' => $request->level,
            'additionalSkills' => $request->additionalSkills,
            'profile_id' => $profile->id,
        ]);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, skills $skills)
    {
        $skills->find($request->skills_id)->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(skills $skills, Request $request)
    {
        return $this->isNotAuthorized($skills) ? $this->isNotAuthorized($skills) : $skills->find($request->skills_id)->delete();
    }

    private function isNotAuthorized($skills)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
