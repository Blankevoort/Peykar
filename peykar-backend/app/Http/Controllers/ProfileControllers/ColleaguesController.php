<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\Profile\colleagues;
use Illuminate\Support\Facades\Auth;

class ColleaguesController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return colleagues::with('profiles')->get();
    }

    public function store(Request $request)
    {
        $profile = Profile::where('user_id', Auth::user()->id)->firstOrFail();

        colleagues::create([
            'name' => $request->name,
            'address' => $request->address,
            'profile_id' => $profile->id,
        ]);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, colleagues $colleagues)
    {
        $colleagues->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(colleagues $colleagues, Request $request)
    {
        return $this->isNotAuthorized($colleagues) ? $this->isNotAuthorized($colleagues) : $colleagues->delete();
    }

    private function isNotAuthorized($colleagues)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
