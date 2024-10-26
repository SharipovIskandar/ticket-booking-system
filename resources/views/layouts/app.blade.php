<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

<header>
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('tickets.index') }}" class="text-white text-lg font-bold">Билеты</a>
            <div>
                <a href="{{ route('tickets.create') }}" class="text-white px-4 hover:underline">Создать новый билет</a>
            </div>
        </div>
    </nav>
</header>

<main class="container mx-auto p-5">
    @yield('content')
</main>

<footer class="bg-blue-600 text-white text-center py-4 mt-5">
    <p>&copy; {{ date('Y') }} Все права защищены.</p>
</footer>

</body>
</html>
