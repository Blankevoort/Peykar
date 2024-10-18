<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Http\Controllers\Controller;
use App\Models\Profile\Socials;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
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
        $socials = Socials::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        $socials->profile()->syncWithoutDetaching($request->profile_id);

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
