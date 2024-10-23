<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\Profile\langs;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LangsController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return langs::with('profiles')->get();
    }

    public function store(Request $request)
    {
        $profile = Profile::where('user_id', Auth::user()->id)->firstOrFail();

        langs::create([
            'lang' => $request->lang,
            'level' => $request->level,
            'profile_id' => $profile->id,
        ]);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, langs $langs)
    {
        $langs->find($request->langs_id)->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(langs $langs, Request $request)
    {
        return $this->isNotAuthorized($langs) ? $this->isNotAuthorized($langs) : $langs->find($request->langs_id)->delete();
    }

    private function isNotAuthorized($langs)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
