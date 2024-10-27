@extends('layouts.app')

@section('title', 'Событие')

@section('content')
    <h1 class="text-3xl font-bold mb-5">Событие</h1>

    @if ($event)
        <div class="mb-4 border-b pb-4">
            <h2 class="text-xl font-bold mb-1">{{ $event->name }}</h2>
            <p class="text-gray-600 mb-1">{{ $event->description }}</p>
            <p class="text-gray-500">{{ $event->date }} - {{ $event->location }}</p>

            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <div class="mt-4">
                    <label for="ticket_type_id" class="block font-medium text-gray-700">Тип билета</label>
                    <select name="ticket_type_id" required class="border border-gray-300 rounded p-2 mt-1 w-full">
                        @foreach ($ticketTypes as $ticketType)
                            <option value="{{ $ticketType->id }}">{{ $ticketType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mt-4">
                    Купить билет
                </button>
            </form>
        </div>
    @else
        <p class="text-red-500">Событие не найдено или билеты недоступны.</p>
    @endif
@endsection
