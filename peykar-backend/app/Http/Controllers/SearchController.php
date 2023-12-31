<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->get('q');
        
        return Job::where('title', 'LIKE', '%' . $search . '%')->get();

        // $title = $request->input('title');
        // $tagId = $request->input('tagId');

        // $query = Job::query();

        // if ($title) {
        //     $query->where('title', 'like', '%' . $title . '%');
        // }

        // if ($tagId) {
        //     $query->whereHas('tags', function ($query) use ($tagId) {
        //         $query->where('id', $tagId);
        //     });
        // }

        // $result = $query->get();

        // $count = $result->count();

        // return response()->json(['result' => $result, 'count' => $count]);
    }
}
