<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\Profile\activities;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ActivitiesController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return activities::with('profiles')->get();
    }

    public function store(Request $request)
    {
        $profile = Profile::where('user_id', Auth::user()->id)->firstOrFail();

        if (!$profile) {
            return response()->json(['error' => 'Profile not found for the user'], 404);
        }

        activities::create([
            'name' => $request->name,
            'year' => $request->year,
            'profile_id' => $profile->id, 
        ]);

        return response()->json(['status' => 204]);
    }


    public function update(Request $request, activities $activities)
    {
        $activities->find($request->activities_id)->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(activities $activities, Request $request)
    {
        return $this->isNotAuthorized($activities) ? $this->isNotAuthorized($activities) : $activities->find($request->activities_id)->delete();
    }

    private function isNotAuthorized($activities)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
