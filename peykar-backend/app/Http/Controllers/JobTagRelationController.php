<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobTagRelationController extends Controller
{
    public function addTag(Request $request, Job $job)
    {
        $job->find(1)->tags()->syncWithoutDetaching($request->tag_id);

        return response()->json(['status' => 204]);
    }
}
