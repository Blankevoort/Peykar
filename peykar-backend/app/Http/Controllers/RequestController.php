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

    public function store(HttpRequest $httpRequest)
    {
        $httpRequest->validate([
            'job_id' => 'required|exists:jobs,id',
        ]);

        $existingRequest = Request::where('job_id', $httpRequest->input('job_id'))
            ->where('user_id', Auth::id())
            ->first();

        if ($existingRequest) {
            return response()->json('', 409);
        }

        Request::create([
            'job_id' => $httpRequest->input('job_id'),
            'user_id' => auth()->id(),
        ]);

        return response()->json('', 204);
    }

    public function update(HttpRequest $request)
    {
        $jobRequest = Request::findOrFail($request->request_id);
        $jobRequest->update($request->all());

        return response()->json('', 204);
    }

    public function destroy(Request $request)
    {
        $request->delete();

        return response()->json('', 204);
    }
}
