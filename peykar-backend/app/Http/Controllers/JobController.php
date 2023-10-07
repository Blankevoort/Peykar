<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    use HttpResponses;

    public function index()
    {
        $jobs = Job::all();

        foreach ($jobs as $job) {
            $job->created_at = Carbon::parse($job->created_at)->format("Y-m-d");
            $job->save();
        }
        return $jobs;
    }

    public function store(Request $request)
    {
        $request->validate([
            'tags' => 'required',
            'title' => 'required',
            'workDate' => 'required',
            'workHours' => 'required',
            'workSpace' => 'required',
        ]);

        $jobs = Job::create([
            'user_id' => Auth::user()->id,
            'tags' => $request->tags,
            'title' => $request->title,
            'workDate' => $request->workDate,
            'workHours' => $request->workHours,
            'workSpace' => $request->workSpace,
            'description' => $request->description,
        ]);

        return $jobs;
    }

    public function update(Request $request, Job $job)
    {
        if (Auth::user()->id !== $job->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }

        $job->update($request->all());

        return $job;
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
