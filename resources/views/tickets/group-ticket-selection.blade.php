@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-5 bg-white shadow-lg rounded-lg mt-5">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Выберите групповую покупку</h1>

        @if(session('success'))
            <p class="text-green-600 mb-4 text-center">{{ session('success') }}</p>
        @endif

        @if(session('error'))
            <p class="text-red-600 mb-4 text-center">{{ session('error') }}</p>
        @endif

        <form action="{{ route('buy-ticket.group.confirm') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="event_id" class="block text-sm font-medium text-gray-700">Мероприятие:</label>
                <select name="event_id" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
                    @foreach($events as $event)
                        <option value="{{ $event->id }}">{{ $event->name }} ({{ $event->ticket_count }} билетов осталось)</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="ticket_type_id" class="block text-sm font-medium text-gray-700">Тип билета:</label>
                <select name="ticket_type_id" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
                    @foreach($ticketTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }} ({{ $type->price }} сум, {{ $type->available_amount }} билетов осталось)</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="ticket_count" class="block text-sm font-medium text-gray-700">Количество билетов:</label>
                <input type="number" name="ticket_count" min="1" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Имя:</label>
                <input type="text" name="name" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" name="email" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <button type="submit" class="btn-primary w-full py-2 mt-6 bg-blue-600 text-white rounded-md shadow hover:bg-blue-500 transition">Купить</button>
        </form>
    </div>
@endsection
