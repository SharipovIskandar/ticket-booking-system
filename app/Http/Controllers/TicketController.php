<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $ticketTypes = TicketType::all();
        return view('tickets.index', compact('events', 'ticketTypes'));
    }

    public function purchase(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'ticket_type_id' => 'required|exists:ticket_types,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Bu yerda tranzaktsiyani bajarish va buyurtma va biletlarni saqlash lozim

        return redirect()->back()->with('success', 'Билет успешно куплен!');
    }
}
