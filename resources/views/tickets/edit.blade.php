<!-- resources/views/tickets/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Ticket')

@section('content')
    <h1 class="text-3xl font-bold mb-5">Edit Ticket</h1>

    @if($errors->any())
        <div class="bg-red-500 text-white p-4 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tickets.update', $ticket->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Ticket Name</label>
            <input type="text" name="name" id="name" value="{{ $ticket->name }}" class="border border-gray-300 rounded p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="barcode" class="block text-gray-700">Barcode</label>
            <input type="text" name="barcode" id="barcode" value="{{ $ticket->barcode }}" class="border border-gray-300 rounded p-2 w-full" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Update Ticket</button>
    </form>
@endsection
