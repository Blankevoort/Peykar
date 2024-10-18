<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\Profile\academicExperience;
use Illuminate\Support\Facades\Auth;

class AcademicExperienceController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return academicExperience::with('profiles')->get();
    }

    public function store(Request $request)
    {
        $academicExperience = academicExperience::create([
            'name' => $request->name,
            'year' => $request->year,
        ]);

        $academicExperience->profiles()->syncWithoutDetaching($request->profile_id);

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

    private function isNotAuthorized($academicExperiences)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
