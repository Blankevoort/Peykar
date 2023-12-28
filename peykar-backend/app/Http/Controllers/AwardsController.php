<?php

namespace App\Http\Controllers;

use App\Models\awards;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
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
        $awards = awards::create([
            'name' => $request->name,
            'year' => $request->year,
        ]);

        $awards->profiles()->syncWithoutDetaching($request->profile_id);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, awards $awards)
    {
        return $this->error('', 'You are not authorized to make this request', 403);

        $awards->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(awards $awards)
    {
        return $this->isNotAuthorized($awards) ? $this->isNotAuthorized($awards) : $awards->delete();
    }

    private function isNotAuthorized($awards)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
