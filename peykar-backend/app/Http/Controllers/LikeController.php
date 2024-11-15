<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Request $request)
    {
        $user = $request->user();
        $job = Job::findOrFail($request->job_id);

        $existingLike = $user->likes()->where('job_id', $job->id)->first();

        if ($existingLike) {
            $existingLike->delete();
            return response()->json(['message' => 'Like removed'], 200);
        } else {
            $like = new Like();
            $like->user()->associate($user);
            $like->job()->associate($job);
            $like->save();

            return response()->json(['message' => 'Like added'], 201);
        }
    }
}