<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $request->user()->likes()->syncWithoutDetaching($request->job_id);

        return response()->json(['status' => 204,], 204);
    }

    public function destroy(Like $like)
    {
        $like->delete();

        return response()->json(['status' => 204], 204);
    }
}
