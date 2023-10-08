<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Traits\HttpResponses;

class TagController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return Tag::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags',
        ]);

        $tag = Tag::create([
            'name' => $request->name,
        ]);

        return $tag;
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags,name,' . $tag->id, 
        ]);

        $tag->update([
            'name' => $request->name,
        ]);

        return $tag;
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json(['message' => 'Tag deleted successfully']);
    }
}
