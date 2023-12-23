<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminPanelController extends Controller
{
    public function index()
    {
        return;
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    //Get Something

    public function getUser(Request $request)
    {
        $userId = $request->id;

        $user = User::find($userId);

        return $user;
    }

    public function getAllUsers()
    {
        return User::all();
    }

    public function getJobs()
    {
        return Job::all();
    }

    public function getTags()
    {
        return Tag::all();
    }

    public function getProfiles()
    {
        return Profile::all();
    }

    public function getTickets()
    {
        return Ticket::all();
    }

    //Create Something

    public function createJob(Request $request)
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

        return response()->json(['status' => 204]);
    }

    public function createTag(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags',
        ]);

        $tag = Tag::create([
            'name' => $request->name,
        ]);

        return response()->json(['status' => 204]);
    }

    public function createProfile(Request $request)
    {
        $user = Auth::user();

        if ($user->profile == null) {
            $profile = Profile::create([
                'user_id' => $request->user_id,
                'name' => $request->name,
                'birth' => $request->birth,
                'resume' => $request->resume,
                'description' => $request->description,
            ]);
        } else {
            return response()->json(['This User Do Have a Profile!!']);
        }

        return response()->json(['status' => 204]);
    }

    public function createTicket(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $ticket = Ticket::create([
            'title' => $request->title,
            'priority' => $request->priority,
            'description' => $request->description,
        ]);

        return response()->json(['status' => 204]);
    }
}
