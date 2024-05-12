<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->user();
        $job = Job::findOrFail($request->job_id);

        $existingLike = $user->likes()->where('job_id', $job->id)->first();
        if ($existingLike) {
            return response()->json(['like_id' => $existingLike->id], 409);
        }

        $like = new Like();
        $like->user()->associate($user);
        $like->job()->associate($job);
        $like->save();

        return response()->json('', 204);
    }


    public function destroy(Like $like)
    {
        $like->delete();

        return response()->json('', 204);
    }
}
