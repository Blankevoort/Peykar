<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Http\Controllers\Controller;
use App\Models\Profile\awards;
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
