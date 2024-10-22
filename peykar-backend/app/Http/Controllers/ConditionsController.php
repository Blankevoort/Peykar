<?php

namespace App\Http\Controllers;

use App\Models\Conditions;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class ConditionsController extends Controller
{
    use HttpResponses;

    public function index(Request $request)
    {
        return Conditions::where('job_id', $request->job_id)->get();
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, Conditions $conditions)
    {
        if (Auth::user()->id !== $conditions->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }

        $conditions->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(Conditions $conditions)
    {
        return $this->isNotAuthorized($conditions) ? $this->isNotAuthorized($conditions) : $conditions->delete();
    }

    private function isNotAuthorized($conditions)
    {
        if (Auth::user()->id !== $conditions->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
