<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\Profile\courses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return courses::with('profiles')->get();
    }

    public function store(Request $request)
    {
        $profile = Profile::where('user_id', Auth::user()->id)->firstOrFail();

        courses::create([
            'name' => $request->name,
            'organizer' => $request->organizer,
            'country' => $request->country,
            'certified' => $request->certified,
            'length' => $request->length,
            'year' => $request->year,
            'profile_id' => $profile->id,
        ]);

        return response()->json(['status' => 204]);
    }


    public function update(Request $request, courses $courses)
    {
        $courses->find($request->courses_id)->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(courses $courses, Request $request)
    {
        return $this->isNotAuthorized($courses) ? $this->isNotAuthorized($courses) : $courses->find($request->courses_id)->delete();
    }

    private function isNotAuthorized($courses)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
