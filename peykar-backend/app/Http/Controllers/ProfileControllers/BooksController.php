<?php

namespace App\Http\Controllers\ProfileControllers;

use App\Http\Controllers\Controller;
use App\Models\Profile\books;
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
            'publisher' =>$request->publisher,
            'year' => $request->year,
        ]);

        $books->profiles()->syncWithoutDetaching($request->profile_id);

        return response()->json(['status' => 204]);
    }

    public function update(Request $request, books $books)
    {
        $books->find($request->books_id)->update($request->all());

        return response()->json(['status' => 204]);
    }

    public function destroy(books $books, Request $request)
    {
        return $this->isNotAuthorized($books) ? $this->isNotAuthorized($books) : $books->find($request->books_id)->delete();
    }

    private function isNotAuthorized($books)
    {
        if (!Auth::user()->id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
