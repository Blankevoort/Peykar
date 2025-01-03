<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return Profile::with('socials', 'awards', 'books', 'activities', 'academicEXPS', 'courses', 'langs', 'skills', 'colleagues', 'educations', 'workExperience')->where('user_id', Auth::user()->id)->get();
    }

    public function store(Request $request)
    {
        Profile::create([
            'user_id' => Auth::user()->id,
            'birth' => $request->birth,
            'resume' => $request->resume,
            'description' => $request->description,
            'gender' => $request->gender,
            'maritalStatus' => $request->maritalStatus,
            'militaryServiceStatus' => $request->militaryServiceStatus,
            'city' => $request->city,
            'region' => $request->region,
            'expectedSalary' => $request->expectedSalary,
            'preferredJob' => json_encode($request->preferredJob),
            'foreigners' => $request->foreigners,
            'disability' => $request->disability,
            'nationality' => $request->nationality,
            'disabilityType' => $request->disabilityType,
        ]);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, Profile $profile)
    {
        if (Auth::user()->id !== $profile->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }

        $profile->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(Profile $profile)
    {
        return $this->isNotAuthorized($profile) ? $this->isNotAuthorized($profile) : $profile->delete();
    }

    private function isNotAuthorized($profile)
    {
        if (Auth::user()->id !== $profile->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
