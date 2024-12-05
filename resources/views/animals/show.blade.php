<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Информация о животном</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Шапка с навигацией -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Виртуальный Зоопарк</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Переключить навигацию">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cages.index') }}">Клетки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('animals.index') }}">Животные</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Информация о животном</h1>

        <h2>{{ $animal->name }}</h2>
        <p><strong>Вид:</strong> {{ $animal->species }}</p>
        <p><strong>Возраст:</strong> {{ $animal->age }} лет</p>
        <p><strong>Описание:</strong> {{ $animal->description ?: 'Нет описания' }}</p>
        <p>
            <strong>Клетка:</strong>
            @if ($animal->cage)
                Клетка №{{ $animal->cage->id }} (вместимость: {{ $animal->cage->capacity }})
            @else
                Нет клетки
            @endif
        </p>

        @if ($animal->image)
            <div>
                <strong>Изображение:</strong><br>
                <img src="{{ asset('storage/' . $animal->image) }}" alt="Изображение животного" class="mt-3" style="max-width: 300px;">
            </div>
        @endif

        <a href="{{ route('animals.index') }}" class="btn btn-secondary">Вернуться к списку животных</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
