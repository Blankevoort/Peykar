<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Models\Profile\colleagues;
use Illuminate\Support\Facades\Auth;

class FormerColleaguesController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return colleagues::with('profiles')->get();
    }

    public function store(Request $request)
    {
        $profile = Profile::where('user_id', Auth::user()->id)->firstOrFail();

        $validatedData = $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
            'organizationName' => ['required', 'string', 'max:255'],
            'jobTitle' => ['nullable', 'string', 'max:255'],
            'organizationalRelationship' => ['required', 'string', 'max:255'],
            'contactNumber' => ['required', 'string', 'max:11'],
            'startYear' => ['required', 'string', 'max:10'],
            'endYear' => ['nullable', 'string', 'max:10'],
            'weStillWorkTogether' => ['nullable', 'boolean'],
        ]);

        colleagues::create(array_merge($validatedData, ['profile_id' => $profile->id]));

        return response()->json(['message' => 'Work experience added successfully'], 201);
    }

    public function update(Request $request, colleagues $colleague)
    {
        $colleague->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(colleagues $colleague, Request $request)
    {
        return $this->isNotAuthorized($colleague) ? $this->isNotAuthorized($colleague) : $colleague->delete();
    }

    private function isNotAuthorized($colleague)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
