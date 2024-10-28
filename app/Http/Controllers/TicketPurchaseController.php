<?php

namespace App\Http\Controllers;

use App\Helpers\BarcodeGenerator;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\TicketBarcode;
use App\Models\TicketType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TicketPurchaseController extends Controller
{
    public function showGroupTicketSelection()
    {
        $events = Event::where('ticket_count', '>', 0)->get();
        $ticketTypes = TicketType::all();

        return view('tickets.group-ticket-selection', compact('events', 'ticketTypes'));
    }


    public function showTicketSelection()
    {
        $events = Event::all();
        $ticketTypes = TicketType::all();
        return view('tickets.select-ticket', compact('events', 'ticketTypes'));
    }

    public function confirmPurchase(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'ticket_type_id' => 'required|exists:ticket_types,id',
            'ticket_count' => 'required|integer|min:1',
        ]);

        $event = Event::find($validated['event_id']);
        $ticketType = TicketType::find($validated['ticket_type_id']);

        return view('tickets.confirm-purchase', compact('event', 'ticketType', 'validated.ticket_count'));
    }

    public function completePurchase(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'ticket_type_id' => 'required|exists:ticket_types,id',
            'ticket_count' => 'required|integer|min:1',
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        DB::beginTransaction();
        try {
            $user = User::firstOrCreate(['email' => $validated['email']], ['full_name' => $validated['name']]);
            $ticketType = TicketType::find($validated['ticket_type_id']);

            if (!$ticketType || $ticketType->available_amount < $validated['ticket_count']) {
                return redirect()->route('buy-ticket.select')->with('error', 'Тип билета не найден или недостаточно билетов.');
            }

            $totalAmount = $ticketType->price * $validated['ticket_count'];

            $order = $user->orders()->create([
                'event_id' => $validated['event_id'],
                'ticket_type_id' => $validated['ticket_type_id'],
                'ticket_count' => $validated['ticket_count'],
                'total_amount' => $totalAmount,
                'order_date' => now(),
            ]);

            $ticketType->decrement('available_amount', $validated['ticket_count']);

            $event = Event::find($validated['event_id']);
            $event->decrement('ticket_count', $validated['ticket_count']);

            $ticketIds = [];
            for ($i = 0; $i < $validated['ticket_count']; $i++) {
                $ticket = Ticket::create([
                    'order_id' => $order->id,
                    'ticket_type_id' => $validated['ticket_type_id'],
                    'is_used' => false,
                ]);
                $ticketIds[] = $ticket->id;
            }

            foreach ($ticketIds as $ticketId) {
                $barcode = BarcodeGenerator::generateBarcode();
                TicketBarcode::create([
                    'ticket_id' => $ticketId,
                    'barcode' => $barcode,
                ]);
            }

            DB::commit();
            return redirect()->route('buy-ticket.select')->with('success', 'Билет успешно куплен. Бар кодлар generatsiya qilindi.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Ошибка при покупке билета: ' . $e->getMessage());
            return redirect()->route('buy-ticket.select')->with('error', 'Ошибка при покупке билета.');
        }
    }



    public function confirmGroupPurchase(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'ticket_type_id' => 'required|exists:ticket_types,id',
            'ticket_count' => 'required|integer|min:1',
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        DB::beginTransaction();
        try {
            $user = User::firstOrCreate(['email' => $validated['email']], ['full_name' => $validated['name']]);
            $ticketType = TicketType::find($validated['ticket_type_id']);

            if (!$ticketType || $ticketType->available_amount < $validated['ticket_count']) {
                return redirect()->route('buy-ticket.group')->with('error', 'Тип билета не найден или недостаточно билетов.');
            }

            $totalAmount = $ticketType->price * $validated['ticket_count'];

            $order = $user->orders()->create([
                'event_id' => $validated['event_id'],
                'ticket_type_id' => $validated['ticket_type_id'],
                'ticket_count' => $validated['ticket_count'],
                'total_amount' => $totalAmount,
                'order_date' => now(),
            ]);

            $ticketType->decrement('available_amount', $validated['ticket_count']);

            $ticketIds = [];

            for ($i = 0; $i < $validated['ticket_count']; $i++) {
                // Tickets jadvaliga yozish
                $ticket = Ticket::create([
                    'order_id' => $order->id,
                    'ticket_type_id' => $validated['ticket_type_id'],
                    'is_used' => false,
                ]);

                $ticketIds[] = $ticket->id;
            }

            foreach ($ticketIds as $ticketId) {
                $barcode = BarcodeGenerator::generateBarcode();
                TicketBarcode::create([
                    'ticket_id' => $ticketId,
                    'barcode' => $barcode,
                ]);
            }

            DB::commit();
            return redirect()->route('buy-ticket.group')->with('success', 'Билеты успешно куплены.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Ошибка при покупке билета: ' . $e->getMessage());
            return redirect()->route('buy-ticket.group')->with('error', 'Ошибка при покупке билета.');
        }
    }

}
