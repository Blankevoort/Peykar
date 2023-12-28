<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return books::with('profiles')->get();
    }

    public function store(Request $request)
    {
        $books = books::create([
            'name' => $request->name,
            'publisher' => $request->pyblisher,
            'year' => $request->year,
        ]);

        $books->profiles()->syncWithoutDetaching($request->profile_id);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, books $books)
    {
        return $this->error('', 'You are not authorized to make this request', 403);

        $books->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(books $books)
    {
        return $this->isNotAuthorized($books) ? $this->isNotAuthorized($books) : $books->delete();
    }

    private function isNotAuthorized($books)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
