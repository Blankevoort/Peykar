<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Models\Profile\portfolio;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return portfolio::with('profiles')->get();
    }

    public function store(Request $request)
    {
        $profile = Profile::where('user_id', Auth::user()->id)->firstOrFail();

        $validatedData = $request->validate([
            'url' => ['required', 'string', 'max:120'],
        ]);

        portfolio::create(array_merge($validatedData, ['profile_id' => $profile->id]));

        return response()->json(['message' => 'Work experience added successfully'], 201);
    }

    public function update(Request $request, portfolio $portfolio)
    {
        $portfolio->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(portfolio $portfolio, Request $request)
    {
        return $this->isNotAuthorized($portfolio) ? $this->isNotAuthorized($portfolio) : $portfolio->delete();
    }

    private function isNotAuthorized($portfolio)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
