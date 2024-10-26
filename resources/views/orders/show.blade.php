@extends('layouts.app')

@section('title', 'Просмотр заказа')

@section('content')
    <h1 class="text-3xl font-bold mb-5">Просмотр заказа</h1>

    <div class="bg-white p-6 rounded shadow">
        <p><strong>ID заказа:</strong> {{ $order->id }}</p>
        <p><strong>Штрих-код:</strong> {{ $order->barcode }}</p>
        <p><strong>ID события:</strong> {{ $order->event_id }}</p>
        <p><strong>Дата события:</strong> {{ $order->event_date }}</p>
        <p><strong>Цена билета для взрослых:</strong> {{ $order->ticket_adult_price }}</p>
        <p><strong>Количество билетов для взрослых:</strong> {{ $order->ticket_adult_quantity }}</p>
        <p><strong>Цена билета для детей:</strong> {{ $order->ticket_kid_price }}</p>
        <p><strong>Количество билетов для детей:</strong> {{ $order->ticket_kid_quantity }}</p>
        <p><strong>Итоговая цена:</strong> {{ $order->equal_price }}</p>
        <a href="{{ route('orders.edit', $order->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Редактировать</a>
        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Удалить</button>
        </form>
    </div>
@endsection
<?php
