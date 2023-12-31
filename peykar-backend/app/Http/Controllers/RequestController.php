<?php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{
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

    public function destroy(Request $request)
    {
        $request->delete();

        return response()->json(['status' => 204], 204);
    }
}
