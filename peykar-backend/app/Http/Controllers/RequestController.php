<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return Request::all();
    }

    public function store($jobId)
    {
        $existingRequest = Request::where('job_id', $jobId)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingRequest) {
            return response()->json(['status' => 409]);
        }

        Request::create([
            'job_id' => $jobId,
            'user_id' => auth()->id(),
        ]);

        return response()->json(['status' => 204]);
    }

    public function update(HttpRequest $request, $requestId)
    {
        $jobRequest = Request::findOrFail($requestId);
        $jobRequest->update($request->all());

        return response()->json(['status' => 204]);
    }

}
