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

        $underDiploma = $request->degree ? false : $request->underDiploma;

        educations::create([
            'degree' => $request->degree,
            'field' => $request->field,
            'university' => $request->university,
            'gpa' => $request->gpa,
            'start' => $request->startYear,
            'end' => $request->endYear,
            'stillStuding' => $request->isStudying,
            'underDiploma' => $underDiploma,
            'profile_id' => $profile->id,
        ]);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, $id)
    {
        $educations = educations::findOrFail($id);

        $underDiploma = $request->degree ? false : $request->underDiploma;

        $profile = Profile::where('user_id', Auth::user()->id)->firstOrFail();

        $educations->update([
            'grade' => $request->grade,
            'fieldofStudy' => $request->degree,
            'university' => $request->university,
            'GPA' => $request->gpa,
            'start' => $request->startYear,
            'end' => $request->endYear,
            'stillStuding' => $request->isStudying,
            'underDiploma' => $underDiploma,
            'profile_id' => $profile->id,
        ]);

        return response()->json(['status' => 204]);
    }

    public function destroy($id, Request $request)
    {
        $educations = educations::findOrFail($id);

        return $this->isNotAuthorized($educations) ? $this->isNotAuthorized($educations) : $educations->delete();
    }

    private function isNotAuthorized($educations)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
