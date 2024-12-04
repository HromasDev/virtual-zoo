<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Клетка: {{ $cage->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Клетка: {{ $cage->name }} ({{ $cage->capacity }} мест)</h1>

        <h2 class="mt-3">Список животных в клетке:</h2>
        <ul class="list-group">
            @forelse ($animals as $animal)
                <li class="list-group-item">
                    <strong>{{ $animal->name }}</strong> ({{ $animal->species }}) - Возраст: {{ $animal->age }} лет
                    <a href="{{ route('animals.show', $animal->id) }}" class="btn btn-info btn-sm float-end">Просмотреть</a>
                </li>
            @empty
                <p>В этой клетке нет животных.</p>
            @endforelse
        </ul>

        <a href="{{ route('cages.index') }}" class="btn btn-secondary mt-3">Назад к списку клеток</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>