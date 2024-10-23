<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\Profile\awards;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AwardsController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return awards::with('profiles')->get();
    }

    public function store(Request $request)
    {
        $profile = Profile::where('user_id', Auth::user()->id)->firstOrFail();

        if (!$profile) {
            return response()->json(['error' => 'Profile not found for the user'], 404);
        }

        awards::create([
            'name' => $request->name,
            'year' => $request->year,
            'profile_id' => $profile->id, 
        ]);

        return response()->json(['status' => 204]);
    }


    public function update(Request $request, awards $awards)
    {
        $awards->find($request->awards_id)->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(awards $awards, Request $request)
    {
        return $this->isNotAuthorized($awards) ? $this->isNotAuthorized($awards) : $awards->find($request->awards_id)->delete();
    }

    private function isNotAuthorized($awards)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
