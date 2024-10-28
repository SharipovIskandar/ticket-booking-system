@extends('layouts.app')

@section('title', 'Покупка билета')

@section('content')
<h1>Покупка билета</h1>

@if(session('success'))
<p style="color: green;">{{ session('success') }}</p>
@endif

@if(session('error'))
<p style="color: red;">{{ session('error') }}</p>
@endif

<form action="{{ route('buy-ticket.purchase') }}" method="POST">
    @csrf
    <label for="event_id">Мероприятие:</label>
    <select name="event_id" required>
        @foreach($events as $event)
        <option value="{{ $event->id }}">{{ $event->name }}</option>
        @endforeach
    </select>

    <label for="ticket_type_id">Тип билета:</label>
    <select name="ticket_type_id" required>
        @foreach($ticketTypes as $type)
        <option value="{{ $type->id }}">{{ $type->name }} ({{ $type->price }} сум)</option>
        @endforeach
    </select>

    <label for="name">Имя и Фамилия:</label>
    <input type="text" name="name" required>

    <label for="email">Электронная почта:</label>
    <input type="email" name="email" required>

    <button type="submit">Купить билет</button>
</form>
@endsection
