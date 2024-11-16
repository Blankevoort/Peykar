<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile\softwareSkills;

class SoftwareSkillsController extends Controller
{
    public function index()
    {
        return softwareSkills::with('profiles')->get();
    }

    public function store(Request $request)
    {
        $profile = Profile::where('user_id', Auth::user()->id)->firstOrFail();

        softwareSkills::create([
            'name' => $request->name,
            'level' => $request->level,
            'profile_id' => $profile->id,
        ]);

        return response()->json(['status' => 204]);
    }


    public function update(Request $request, softwareSkills $softwareSkill)
    {
        $softwareSkill->find($request->softwareSkill_id)->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(softwareSkills $softwareSkill, Request $request)
    {
        return $this->isNotAuthorized($softwareSkill) ? $this->isNotAuthorized($softwareSkill) : $softwareSkill->find($request->softwareSkill_id)->delete();
    }

    private function isNotAuthorized($softwareSkill)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
