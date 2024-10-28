<?php

namespace App\Http\Controllers;

use App\Helpers\BarcodeGenerator;
use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\TicketBarcode;
use App\Models\TicketType;
use App\Models\User;
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
        $ticket = Ticket::with('ticketType')->findOrFail($id);
        $customerName = $ticket->customer_name;
        $customerEmail = $ticket->customer_email;
        $barcode = TicketBarcode::query()->where('ticket_id', $id)->first()->barcode;

        return view('tickets.show', compact('ticket', 'customerName', 'customerEmail', 'barcode'));

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
