@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-5 bg-white shadow-lg rounded-lg mt-5">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Подтверждение покупки</h1>

        <div class="mb-6">
            <p class="text-lg font-semibold">Мероприятие: <span class="text-blue-600">{{ $event->name }}</span></p>
            <p class="text-lg font-semibold">Тип билета: <span class="text-blue-600">{{ $ticketType->name }}</span></p>
            <p class="text-lg font-semibold">Цена: <span class="text-blue-600">{{ $ticketType->price }} сум</span></p>
        </div>

        <form action="{{ route('buy-ticket.purchase') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            <input type="hidden" name="ticket_type_id" value="{{ $ticketType->id }}">

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Имя и Фамилия:</label>
                <input type="text" name="name" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Электронная почта:</label>
                <input type="email" name="email" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <button type="submit" class="btn-primary w-full">Подтвердить покупку</button>
        </form>
    </div>
@endsection
