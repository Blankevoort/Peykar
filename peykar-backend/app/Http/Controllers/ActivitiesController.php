<?php

namespace App\Http\Controllers;

use App\Models\activities;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
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
        $activities = activities::create([
            'name' => $request->name,
            'year' => $request->year,
        ]);

        $activities->profiles()->syncWithoutDetaching($request->profile_id);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, activities $activities)
    {
        return $this->error('', 'You are not authorized to make this request', 403);

        $activities->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(activities $activities)
    {
        return $this->isNotAuthorized($activities) ? $this->isNotAuthorized($activities) : $activities->delete();
    }

    private function isNotAuthorized($activities)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
