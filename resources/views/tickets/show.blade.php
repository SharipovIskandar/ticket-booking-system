@extends('layouts.app')

@section('title', 'Просмотр билета')

@section('content')
    <h1 class="text-3xl font-bold mb-5">Просмотр билета</h1>

    <div class="bg-white p-6 rounded shadow">
        <p><strong>ID билета:</strong> {{ $ticket->id }}</p>
        <p><strong>Штрих-код:</strong> {{ $ticket->barcode }}</p>
        <p><strong>ID заказа:</strong> {{ $ticket->order_id }}</p>
        <p><strong>ID типа билета:</strong> {{ $ticket->ticket_type_id }}</p>
    </div>
@endsection
