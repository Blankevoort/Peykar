<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Http\Controllers\Controller;
use App\Models\Profile\langs;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
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
        $langs = langs::create([
            'lang' => $request->lang,
            'level' => $request->level,
        ]);

        $langs->profiles()->syncWithoutDetaching($request->profile_id);

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
