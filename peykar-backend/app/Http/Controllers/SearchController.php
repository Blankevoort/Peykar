<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchJobs(Request $request)
    {
        $title = $request->title;
        $group = $request->group;
        $location = $request->location;

        $query = Job::query();

        if ($title) {
            $query->where('title', 'LIKE', "%{$title}%");
        }

        if ($group) {
            $query->where('group', 'LIKE', "%{$group}%");
        }

        if ($location) {
            $query->where('location', 'LIKE', "%{$location}%");
        }

        $jobIds = $query->pluck('id');

        return response()->json($jobIds);
    }
}
