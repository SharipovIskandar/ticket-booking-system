<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\Order;
use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $events = Event::all();
        return view('tickets.create', [
            'orders' => Order::all(),
            'ticketTypes' => TicketType::all(),
            'events' => $events
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'ticket_type' => 'required|string',
            'barcode' => 'required|string|max:255',
        ]);

        Ticket::create($request->all());

        return redirect()->route('tickets.create')->with('success', 'Билет успешно куплен.');
    }


    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.edit', [
            'ticket' => $ticket,
            'orders' => Order::all(),
            'ticketTypes' => TicketType::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
            'ticket_type_id' => 'required|integer|exists:ticket_types,id',
            'barcode' => 'required|string|unique:tickets,barcode,' . $id,
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());

        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully.');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully.');
    }
}
