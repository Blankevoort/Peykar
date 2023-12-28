<?php

namespace App\Http\Controllers;

use App\Models\Socials;
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

        $socials->profiles()->syncWithoutDetaching($request->profile_id);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, Socials $socials)
    {
        return $this->error('', 'You are not authorized to make this request', 403);

        $socials->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(Socials $socials)
    {
        return $this->isNotAuthorized($socials) ? $this->isNotAuthorized($socials) : $socials->delete();
    }

    private function isNotAuthorized($socials)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
