@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Выбор билета</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('complete-purchase') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="event_id">Выберите событие:</label>
                <select id="event_id" name="event_id" class="form-control" required>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="ticket_type_id">Тип билета:</label>
                <select id="ticket_type_id" name="ticket_type_id" class="form-control" required>
                    @foreach($ticketTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }} - {{ $type->price }}₽</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="ticket_count">Количество билетов:</label>
                <input type="number" id="ticket_count" name="ticket_count" class="form-control" min="1" required>
            </div>

            <div class="form-group">
                <label for="email">Электронная почта:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Купить билет</button>
        </form>
    </div>
@endsection
