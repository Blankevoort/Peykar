<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $history = $request->user()->history()->get();

        return response()->json($history);
    }

    public function destroy(History $history)
    {
        $history->delete();

        return response()->json(['status' => 204], 204);
    }
}
