@extends('layouts.app')

@section('title', $event->name)

@section('content')
    <h1 class="text-3xl font-bold mb-5">{{ $event->name }}</h1>
    <p>{{ $event->description }}</p>
    <p>{{ $event->date }} - {{ $event->location }}</p>

    <h2 class="text-xl font-bold mb-4">Купить билет</h2>
    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <input type="hidden" name="event_id" value="{{ $event->id }}">

        <div class="mb-4">
            <label for="ticket_type_id" class="block text-gray-700">Тип билета</label>
            <select name="ticket_type_id" id="ticket_type_id" class="border border-gray-300 rounded p-2 w-full" required>
                @foreach ($ticketTypes as $ticketType)
                    <option value="{{ $ticketType->id }}">{{ $ticketType->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="barcode" class="block text-gray-700">Штрих-код</label>
            <input type="text" name="barcode" id="barcode" class="border border-gray-300 rounded p-2 w-full" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Купить билет</button>
    </form>
@endsection
