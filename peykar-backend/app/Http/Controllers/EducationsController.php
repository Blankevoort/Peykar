<?php

namespace App\Http\Controllers;

use App\Models\educations;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class EducationsController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return educations::with('profiles')->get();
    }

    public function store(Request $request)
    {
        $educations = educations::create([
            'name' => $request->name,
            'grade' => $request->grade,
            'fieldofStudy' => $request->fieldofStudy,
            'university' => $request->university,
            'GPA' => $request->GPA,
            'start' => $request->start,
            'end' => $request->end,
            'stillStuding' => $request->stillStuding,
            'underDiploma' => $request->underDiploma,
        ]);

        $educations->profiles()->syncWithoutDetaching($request->profile_id);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, educations $educations)
    {
        return $this->error('', 'You are not authorized to make this request', 403);

        $educations->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(educations $educations)
    {
        return $this->isNotAuthorized($educations) ? $this->isNotAuthorized($educations) : $educations->delete();
    }

    private function isNotAuthorized($educations)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
