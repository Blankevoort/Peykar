<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile\academicExperience;

class AcademicExperienceController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return academicExperience::with('profiles')->get();
    }

    public function store(Request $request)
    {
        $profile = Profile::where('user_id', Auth::user()->id)->firstOrFail();

        if (!$profile) {
            return response()->json(['error' => 'Profile not found for the user'], 404);
        }

        academicExperience::create([
            'name' => $request->name,
            'year' => $request->year,
            'profile_id' => $profile->id,
        ]);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, academicExperience $academicExperience)
    {
        $academicExperience->find($request->academicEXP_id)->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(academicExperience $academicExperience, Request $request)
    {
        return $this->isNotAuthorized($academicExperience) ? $this->isNotAuthorized($academicExperience) : $academicExperience->find($request->academicEXP_id)->delete();
    }

    private function isNotAuthorized($academicExperience)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
