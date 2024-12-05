<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список животных</title>
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
        <h1 class="mb-4">Список всех животных</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Вид</th>
                    <th>Клетка</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($animals as $animal)
                <tr>
                    <td>{{ $animal->id }}</td>
                    <td>{{ $animal->name }}</td>
                    <td>{{ $animal->species }}</td>
                    <td>{{ $animal->cage->name ?? 'Нет клетки' }}</td>
                    <td>
                        <a href="{{ route('animals.show', $animal->id) }}" class="btn btn-info btn-sm">Подробнее</a>

                        @auth
                            <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                            <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Вы уверены?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        @endauth
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @auth
            <a href="{{ route('animals.create') }}" class="btn btn-primary">Добавить новое животное</a>
        @endauth

        <a href="{{ route('home') }}" class="btn btn-secondary">На главную</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
