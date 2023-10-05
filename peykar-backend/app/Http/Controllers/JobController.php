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
        return Job::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'tags' => 'required',
            'title' => 'required',
            'workDate' => 'required',
            'workHours' => 'required',
            'workSpace' => 'required',
            'description' => 'required',
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

    public function update(Request $request, Job $jobs)
    {
        if (Auth::user()->id !== $jobs->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }

        $jobs->update($request->all());

        return $jobs;
    }

    public function destroy(Job $jobs)
    {
        return $this->isNotAuthorized($jobs) ? $this->isNotAuthorized($jobs) : $jobs->delete();
    }

    public function userStories()
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
