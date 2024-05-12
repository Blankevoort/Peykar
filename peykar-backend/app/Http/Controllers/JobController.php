<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Resources\JobResource;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    use HttpResponses;

    public function index()
    {
        $jobs = Job::all();

        foreach ($jobs as $job) {
            $job->likeCount = $job->likes->count();
            $job->requestCount = $job->requests->count();

            $liked = false;
            $requested = false;

            if ($job->likes) {
                foreach ($job->likes as $like) {
                    if ($like->user_id) {
                        $liked = true;
                        break;
                    }
                }
            }

            if ($job->requests) {
                foreach ($job->requests as $request) {
                    if ($request->user_id) {
                        $requested = true;
                        break;
                    }
                }
            }

            $job->requested = $requested;
            $job->liked = $liked;
        }

        return JobResource::collection($jobs);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'workDate' => 'required',
            'workHours' => 'required',
            'workSpace' => 'required',
        ]);

        $job = Job::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'workDate' => $request->workDate,
            'workHours' => $request->workHours,
            'description' => $request->description,
            'province' => $request->province,
            'street' => $request->street,
            'rights_min' => $request->rightsMin,
            'rights_max' => $request->rightsMax,
        ]);

        $job->tags()->syncWithoutDetaching($request->tag_id);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, Job $job)
    {
        if (Auth::user()->id == $job->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }

        $job->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);

        if (Auth::user()->id != $job->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }

        $job->delete();

        return response()->json(['message' => 'Job deleted successfully'], 200);
    }


    public function userJobs()
    {
        return Job::where('user_id', Auth::user()->id)->get();
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $request->user()->history()->create(['search' => $search]);

        $jobs = Job::where(function ($query) use ($search) {
            $query->where('title', 'like', "%$search%");
        })
            ->orWhereHas('tags', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->with('tags')
            ->get();

        return $jobs;
    }
}
