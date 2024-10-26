<?php
@extends('layouts.app')

@section('title', 'Edit Event')

@section('content')
    <h1 class="text-3xl font-bold mb-5">Edit Event</h1>

    @if($errors->any())
        <div class="bg-red-500 text-white p-4 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.update', $event->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Event Name</label>
            <input type="text" name="name" id="name" class="border border-gray-300 rounded p-2 w-full" value="{{ $event->name }}" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea name="description" id="description" class="border border-gray-300 rounded p-2 w-full">{{ $event->description }}</textarea>
        </div>
        <div class="mb-4">
            <label for="date" class="block text-gray-700">Date</label>
            <input type="date" name="date" id="date" class="border border-gray-300 rounded p-2 w-full" value="{{ $event->date }}" required>
        </div>
        <div class="mb-4">
            <label for="location" class="block text-gray-700">Location</label>
            <input type="text" name="location" id="location" class="border border-gray-300 rounded p-2 w-full" value="{{ $event->location }}">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Update</button>
    </form>
@endsection
