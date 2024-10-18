<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Traits\HttpResponses;

class TicketController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return Ticket::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $Ticket = Ticket::create([
            'title' => $request->title,
            'priority' => $request->priority,
            'description' => $request->description,
        ]);

        return $Ticket;
    }

    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update($request->all());

        return $ticket;
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return response()->json(['message' => 'Ticket deleted successfully']);
    }
}
