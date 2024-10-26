@extends('layouts.app')

@section('title', 'Покупка билета')

@section('content')
    <h1 class="text-3xl font-bold mb-5">Покупка нового билета</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-500 text-white p-4 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tickets.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label for="event_id" class="block text-gray-700">Выберите событие</label>
            <select name="event_id" id="event_id" class="border border-gray-300 rounded p-2 w-full" required>
                @foreach ($events as $event)
                    <option value="{{ $event->id }}">{{ $event->name }} - {{ $event->date }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="ticket_type" class="block text-gray-700">Тип билета</label>
            <select name="ticket_type" id="ticket_type" class="border border-gray-300 rounded p-2 w-full" required>
                <option value="standard">Стандартный</option>
                <option value="vip">VIP</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="barcode" class="block text-gray-700">Штрих-код</label>
            <input type="text" name="barcode" id="barcode" class="border border-gray-300 rounded p-2 w-full" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Купить билет</button>
    </form>
@endsection
