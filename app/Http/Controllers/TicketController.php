<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        $events = Event::all();
        $ticketTypes = TicketType::all();
        return view('tickets.index', compact('events', 'ticketTypes', 'tickets'));
    }
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }

    public function purchase(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'ticket_type_id' => 'required|exists:ticket_types,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);


        return redirect()->back()->with('success', 'Билет успешно куплен!');
    }
}
