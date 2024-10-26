<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $events = Event::all();
        return view('orders.create', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|integer|exists:events,id',
            'event_date' => 'required|date',
            'ticket_adult_price' => 'required|integer',
            'ticket_adult_quantity' => 'required|integer',
            'ticket_kid_price' => 'required|integer',
            'ticket_kid_quantity' => 'required|integer',
            'barcode' => 'required|string|unique:orders',
            'equal_price' => 'required|integer',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $events = Event::all(); // Eventlar ro'yxatini olish
        return view('orders.edit', compact('order', 'events'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'event_id' => 'required|integer|exists:events,id',
            'event_date' => 'required|date',
            'ticket_adult_price' => 'required|integer',
            'ticket_adult_quantity' => 'required|integer',
            'ticket_kid_price' => 'required|integer',
            'ticket_kid_quantity' => 'required|integer',
            'barcode' => 'required|string|unique:orders,barcode,' . $id,
            'equal_price' => 'required|integer',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
