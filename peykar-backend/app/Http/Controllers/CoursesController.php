<?php

namespace App\Http\Controllers;

use App\Models\courses;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
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
        $courses = courses::create([
            'name' => $request->name,
            'organizer' => $request->organizer,
            'length' => $request->length,
            'country' => $request->country,
            'certified' => $request->certified,
            'year' => $request->year,
        ]);

        $courses->profiles()->syncWithoutDetaching($request->profile_id);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, courses $courses)
    {
        return $this->error('', 'You are not authorized to make this request', 403);

        $courses->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(courses $courses)
    {
        return $this->isNotAuthorized($courses) ? $this->isNotAuthorized($courses) : $courses->delete();
    }

    private function isNotAuthorized($courses)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
