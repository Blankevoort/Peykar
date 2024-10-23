<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\Profile\Socials;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SocialsController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return Socials::with('profiles')->get();
    }

    public function store(Request $request)
    {
        $profile = Profile::where('user_id', Auth::user()->id)->firstOrFail();

        Socials::create([
            'name' => $request->name,
            'address' => $request->address,
            'profile_id' => $profile->id,
        ]);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, Socials $socials)
    {
        $socials->find($request->socials_id)->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(Socials $socials, Request $request)
    {
        return $this->isNotAuthorized($socials) ? $this->isNotAuthorized($socials) : $socials->find($request->socials_id)->delete();
    }

    private function isNotAuthorized($socials)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
