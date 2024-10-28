@extends('layouts.app')

@section('title', 'Просмотр билета')
@section('content')
    <h1 class="text-3xl font-bold mb-5">Просмотр билета</h1>

    <div class="bg-white p-6 rounded shadow">
        <p><strong>ID билета:</strong> {{ $ticket->id }}</p>
        <p><strong>Штрих-код:</strong> {{ $barcode }}</p>
        <p><strong>ID типа билета:</strong> {{ $ticket->ticket_type_id }} ({{ $ticket->ticketType->name ?? 'Не указано' }})</p> <!-- Ticket type name -->
        <p><strong>Дата покупки:</strong> {{ $ticket->created_at }}</p>
        <p><strong>Использован:</strong> {{ $ticket->is_used ? 'Да' : 'Нет' }}</p>
        <p><strong>Дата создания:</strong> {{ $ticket->created_at }}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('tickets.index') }}" class="text-blue-500 hover:underline">Назад к списку билетов</a>
    </div>
@endsection
