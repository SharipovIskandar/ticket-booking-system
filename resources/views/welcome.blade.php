@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1 class="text-4xl font-bold mb-4">Добро пожаловать!</h1>
        <p class="text-xl mb-4">Здесь вы можете управлять своими заказами.</p>
        <a href="{{ route('orders.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Перейти к заказам</a>
        <br><br>
        <a href="{{ route('buy-ticket.select') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Купить билет</a>
    </div>
@endsection
