@extends('layouts.app')

@section('title', 'Список событий')

@section('content')
    <h1 class="text-3xl font-bold mb-5">Список событий</h1>

    @foreach ($events as $event)
        <div class="mb-4 flex justify-between items-center">
            <div>
                <h2 class="text-xl font-bold">{{ $event->name }}</h2>
                <p>{{ $event->description }}</p>
                <p>{{ $event->date }} - {{ $event->location }}</p>
            </div>
            <a href="{{ route('events.show', $event->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                Купить билет
            </a>
        </div>
    @endforeach
@endsection
