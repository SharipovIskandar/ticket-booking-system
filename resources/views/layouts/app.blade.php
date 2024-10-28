<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .btn-primary {
            @apply bg-blue-500 text-white font-bold py-2 px-4 rounded shadow hover:bg-blue-600 transition duration-300;
        }

        .footer-text {
            @apply text-sm text-gray-300;
        }

        .header-title {
            @apply text-2xl font-bold text-white;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

<header>
    <nav class="bg-blue-600 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('tickets.index') }}" class="header-title">Билеты</a>
        </div>
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('buy-ticket.group') }}" class="header-title">buy ticket for group</a>
        </div>
        <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('buy-ticket.select') }}" class="header-title">buy ticket</a>
        </div>
    </nav>
</header>

<main class="container mx-auto p-5 bg-white shadow-lg rounded-lg mt-5">
    @yield('content')
</main>

<footer class="bg-blue-600 text-white text-center py-4 mt-5">
    <p class="footer-text">&copy; {{ date('Y') }} Все права защищены.</p>
</footer>

</body>
</html>
