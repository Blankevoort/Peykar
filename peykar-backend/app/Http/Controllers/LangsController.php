<?php

namespace App\Http\Controllers;

use App\Models\langs;
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
            'name' => $request->name,
            'year' => $request->year,
        ]);

        $langs->profiles()->syncWithoutDetaching($request->profile_id);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, langs $langs)
    {
        return $this->error('', 'You are not authorized to make this request', 403);

        $langs->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(langs $langs)
    {
        return $this->isNotAuthorized($langs) ? $this->isNotAuthorized($langs) : $langs->delete();
    }

    private function isNotAuthorized($langs)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
