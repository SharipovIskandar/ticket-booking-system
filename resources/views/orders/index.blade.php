@extends('layouts.app')

@section('content')
    <h1 class="text-2xl mb-4">Заказы</h1>

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('orders.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Создать новый заказ</a>

    <table class="min-w-full mt-4 border border-gray-300">
        <thead>
        <tr>
            <th class="border border-gray-300 px-4 py-2">ID</th>
            <th class="border border-gray-300 px-4 py-2">Тадбир</th>
            <th class="border border-gray-300 px-4 py-2">Дата</th>
            <th class="border border-gray-300 px-4 py-2">Купленных взрослых билетов</th>
            <th class="border border-gray-300 px-4 py-2">Купленных детских билетов</th>
            <th class="border border-gray-300 px-4 py-2">Баркод</th>
            <th class="border border-gray-300 px-4 py-2">Общая цена</th>
            <th class="border border-gray-300 px-4 py-2">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $order->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $order->event_id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $order->event_date }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $order->ticket_adult_quantity }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $order->ticket_kid_quantity }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $order->barcode }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $order->equal_price }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('orders.edit', $order->id) }}" class="text-blue-500 hover:underline">Редактировать</a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
