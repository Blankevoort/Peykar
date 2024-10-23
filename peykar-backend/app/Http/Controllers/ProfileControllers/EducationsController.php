<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\Profile\educations;
use App\Http\Controllers\Controller;
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
        $profile = Profile::where('user_id', Auth::user()->id)->firstOrFail();

        educations::create([
            'name' => $request->name,
            'grade' => $request->grade,
            'fieldofStudy' => $request->fieldofStudy,
            'university' => $request->university,
            'GPA' => $request->GPA,
            'start' => $request->start,
            'end' => $request->end,
            'stillStuding' => $request->stillStuding,
            'underDiploma' => $request->underDiploma,
            'profile_id' => $profile->id,
        ]);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, educations $educations)
    {
        $educations->find($request->educations_id)->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(educations $educations, Request $request)
    {
        return $this->isNotAuthorized($educations) ? $this->isNotAuthorized($educations) : $educations->find($request->educations_id)->delete();
    }

    private function isNotAuthorized($educations)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
