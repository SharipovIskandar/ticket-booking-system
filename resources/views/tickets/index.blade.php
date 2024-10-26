@extends('layouts.app')

@section('title', 'Билеты')

@section('content')
    <h1 class="text-3xl font-bold mb-5">Билеты</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-2xl font-semibold mt-6">Доступные билеты</h2>
    <ul class="mt-4">
        @foreach ($tickets as $ticket)
            <li class="border-b border-gray-300 py-2">
                ID билета: {{ $ticket->id }} - {{ $ticket->barcode }}
                <a href="{{ route('tickets.show', $ticket->id) }}" class="text-blue-500 hover:underline">Просмотр</a>
                <a href="{{ route('tickets.edit', $ticket->id) }}" class="text-yellow-500 hover:underline">Редактировать</a>
                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
