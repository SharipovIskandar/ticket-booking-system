@extends('layouts.app')

@section('content')
    <h1 class="text-2xl mb-4">Создать новый заказ</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="event_id" class="block text-gray-700">Тадбир</label>
            <select name="event_id" id="event_id" class="border border-gray-300 rounded p-2 w-full" required>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="event_date" class="block text-gray-700">Дата мероприятия</label>
            <input type="date" name="event_date" id="event_date" class="border border-gray-300 rounded p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="ticket_adult_price" class="block text-gray-700">Цена взрослого билета</label>
            <input type="number" name="ticket_adult_price" id="ticket_adult_price" class="border border-gray-300 rounded p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="ticket_adult_quantity" class="block text-gray-700">Количество взрослых билетов</label>
            <input type="number" name="ticket_adult_quantity" id="ticket_adult_quantity" class="border border-gray-300 rounded p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="ticket_kid_price" class="block text-gray-700">Цена детского билета</label>
            <input type="number" name="ticket_kid_price" id="ticket_kid_price" class="border border-gray-300 rounded p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="ticket_kid_quantity" class="block text-gray-700">Количество детских билетов</label>
            <input type="number" name="ticket_kid_quantity" id="ticket_kid_quantity" class="border border-gray-300 rounded p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="barcode" class="block text-gray-700">Баркод</label>
            <input type="text" name="barcode" id="barcode" class="border border-gray-300 rounded p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="equal_price" class="block text-gray-700">Общая цена</label>
            <input type="number" name="equal_price" id="equal_price" class="border border-gray-300 rounded p-2 w-full" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Создать</button>
    </form>
@endsection
