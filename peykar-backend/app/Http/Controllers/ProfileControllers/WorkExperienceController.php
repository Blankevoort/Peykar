<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile\workExperience;

class WorkExperienceController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return workExperience::with('profiles')->get();
    }

    public function store(Request $request)
    {
        $profile = Profile::where('user_id', Auth::user()->id)->firstOrFail();

        $validatedData = $request->validate([
            'jobTitle' => ['required', 'string', 'max:255'],
            'field' => ['nullable', 'string', 'max:255'],
            'organizationalLevel' => ['nullable', 'string', 'max:255'],
            'companyName' => ['required', 'string', 'max:255'],
            'companyField' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'startMonth' => ['nullable', 'string', 'max:2'],
            'startYear' => ['nullable', 'string', 'max:4'],
            'endMonth' => ['nullable', 'string', 'max:2'],
            'endYear' => ['nullable', 'string', 'max:4'],
            'currentlyWorking' => ['nullable', 'boolean'],
            'achievements' => ['nullable', 'string'],
        ]);

        workExperience::create(array_merge($validatedData, ['profile_id' => $profile->id]));

        return response()->json(['message' => 'Work experience added successfully'], 201);
    }

    public function update(Request $request, workExperience $workExperience)
    {
        $workExperience->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(workExperience $workExperience, Request $request)
    {
        return $this->isNotAuthorized($workExperience) ? $this->isNotAuthorized($workExperience) : $workExperience->delete();
    }

    private function isNotAuthorized($workExperience)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
