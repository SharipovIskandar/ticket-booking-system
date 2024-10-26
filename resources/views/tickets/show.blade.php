@extends('layouts.app')

@section('title', 'Просмотр билета')

@section('content')
    <h1 class="text-3xl font-bold mb-5">Просмотр билета</h1>

    <div class="bg-white p-6 rounded shadow">
        <p><strong>ID билета:</strong> {{ $ticket->id }}</p>
        <p><strong>Штрих-код:</strong> {{ $ticket->barcode }}</p>
        <p><strong>ID заказа:</strong> {{ $ticket->order_id }}</p>
        <p><strong>ID типа билета:</strong> {{ $ticket->ticket_type_id }}</p>
        <a href="{{ route('tickets.edit', $ticket->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Редактировать</a>
        <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Удалить</button>
        </form>
    </div>
@endsection
