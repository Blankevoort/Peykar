<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $jobs = Job::with([
            'employmentCondition.degree',
            'employmentCondition.softwares',
            'employmentCondition',
        ])->get();


        foreach ($jobs as $job) {
            $liked = false;
            $requested = false;
            $tagsList = [];

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

            if ($job->tags) {
                foreach ($job->tags as $tag) {
                    $tagsList[] = $tag->label;
                }
            }

            $job->requested = $requested;
            $job->liked = $liked;
            $job->tagsList = $tagsList;
        }

        return response()->json($jobs);

        // return JobResource::collection($jobs);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|file',
            'workDate' => 'required',
            'workHours' => 'required',
            'description' => 'required',
            'location' => 'required',
            'degree_field' => 'nullable|string',
            'degree_proficiency' => 'nullable|string',
        ]);

        $defaultBackgroundImage = 'https://fileapi.jobvision.ir/StaticFiles/Employer/DefaultImages/default-companyHeader.jpeg?v=20231122';

        if ($request->hasFile('backgroundImage')) {
            $backgroundImage = time() . '-' . $request->file('backgroundImage')->getClientOriginalName();
            $request->file('backgroundImage')->move(storage_path('app/public/backgroundImages'), $backgroundImage);
        } else {
            $backgroundImage = $defaultBackgroundImage;
        }

        if ($request->hasFile('image')) {
            $companyImage = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(storage_path('app/public/companyImages'), $companyImage);
        } else {
            return response()->json(['error' => 'Company image is required'], 422);
        }

        $randomDays = rand(30, 360);

        $expiresAt = Carbon::now()->addDays($randomDays);

        $job = Job::create([
            'user_id' => $request->user()->id,
            'backgroundImage' => $backgroundImage,
            'image' => $companyImage,
            'title' => $request->title,
            'workDate' => $request->workDate,
            'workConditions' => $request->workHours,
            'benefits' => json_encode($request->benefits),
            'description' => $request->description,
            'similarExperience' => $request->similarExperience,
            'location' => $request->location,
            'rightsMin' => $request->rightsMin,
            'rightsMax' => $request->rightsMax,
            'expiresAt' => $expiresAt,
        ]);

        $condition = $job->employmentCondition()->create([
            'age' => $request->age,
            'gender' => $request->gender,
            'militaryService' => $request->militaryService,
        ]);

        if ($request->degree_field && $request->degree_proficiency) {
            $condition->degree()->create([
                'field' => $request->degree_field,
                'proficiency' => $request->degree_proficiency,
                'condition_id' => $condition->id,
            ]);
        }

        if ($request->has('softwares')) {
            $softwares = json_decode($request->input('softwares'), true);

            foreach ($softwares as $software) {
                $condition->softwares()->create([
                    'name' => $software['name'],
                    'proficiency' => $software['proficiency'],
                ]);
            }
        }

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

    public function show($id)
    {
        $job = Job::findOrFail($id);

        $job->likeCount = $job->likes->count();
        $job->requestCount = $job->requests->count();
        $job->tagsCount = $job->tags->count();

        $liked = false;
        $requested = false;
        $tagsList = [];

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

        if ($job->tags) {
            foreach ($job->tags as $tag) {
                $tagsList[] = $tag->name;
            }
        }

        $job->requested = $requested;
        $job->liked = $liked;
        $job->tagsList = $tagsList;

        return new JobResource($job);
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
