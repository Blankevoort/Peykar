<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Traits\HttpResponses;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return Request::all();
    }

    public function store(HttpRequest $httpRequest)
    {
        $httpRequest->validate([
            'job_id' => 'required|exists:jobs,id',
        ]);

        $request = Request::create([
            'job_id' => $httpRequest->input('job_id'),
            'user_id' => auth()->id(),
        ]);

        return response()->json(['status' => 'success', 'request' => $request]);
    }

    public function update(HttpRequest $httpRequest, Request $jobRequest)
    {
        $httpRequest->validate([
            'state' => 'required|in:قبول شده,اولویت بررسی,رد شده',
        ]);

        $jobRequest->update($httpRequest->all());

        return response()->json(['status' => 204], 204);
    }

    public function destroy(Request $request)
    {
        $request->delete();

        return response()->json(['status' => 204], 204);
    }
}
