<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    use HttpResponses;

    public function index(Request $request)
    {
        $jobs = Job::all();
        foreach ($jobs as $job) {
            $job->likeCount = $job->likes->count();
            //return $job->likes;
            if ($job->likes->where('id', $request->user()->id)->first()) {
                $liked = true;
            } else {
                $liked = false;
            }
            $job->liked = $liked;
        }
        return $jobs;
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
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'workDate' => $request->workDate,
            'workHours' => $request->workHours,
            'workSpace' => $request->workSpace,
            'description' => $request->description,
        ]);

        $job->tags()->syncWithoutDetaching($request->tag_id);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, Job $job)
    {
        if (Auth::user()->id !== $job->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }

        $job->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(Job $job)
    {
        return $this->isNotAuthorized($job) ? $this->isNotAuthorized($job) : $job->delete();
    }

    public function userJobs()
    {
        return Job::where('user_id', Auth::user()->id)->get();
    }

    private function isNotAuthorized($jobs)
    {
        if (Auth::user()->id !== $jobs->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
