<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;

class TagController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return Tag::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|unique:tags',
        ]);

        Tag::create([
            'label' => $request->label,
        ]);

        return response()->json('', 204);
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'label' => 'required|unique:tags,label,' . $tag->id,
        ]);

        $tag->update([
            'label' => $request->label,
        ]);

        return $tag;
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json('', 204);
    }

    public function removeTagFromJob($jobId, $tagId)
    {
        $job = Job::findOrFail($jobId);

        // Detach the tag from the job
        $job->tags()->detach($tagId);

        return response()->json(['message' => 'Tag removed from job successfully'], 200);
    }

    public function addTagToJob(Request $request, $jobId)
    {
        $job = Job::findOrFail($jobId);

        // Validate the request data
        $request->validate([
            'tag_id' => 'required|exists:tags,id',
        ]);

        // Attach the tag to the job
        $job->tags()->attach($request->tag_id);

        return response()->json(['message' => 'Tag added to job successfully'], 200);
    }
}
