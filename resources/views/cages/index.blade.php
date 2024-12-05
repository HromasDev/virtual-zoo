<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список клеток</title>
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
        <h1 class="mb-4">Список всех клеток</h1>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Вместимость</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cages as $cage)
                    <tr>
                        <td>{{ $cage->id }}</td>
                        <td>{{ $cage->name }}</td>
                        <td>{{ $cage->capacity }} мест</td>
                        <td>
                            <a href="{{ route('cages.show', $cage->id) }}" class="btn btn-info btn-sm">Просмотреть клетку</a>
                            @auth
                                <a href="{{ route('cages.edit', $cage->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                                <form action="{{ route('cages.destroy', $cage->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Вы уверены, что хотите удалить клетку?');">
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
            <a href="{{ route('cages.create') }}" class="btn btn-primary">Добавить новую клетку</a>
        @endauth
        <a href="{{ route('home') }}" class="btn btn-secondary">На главную</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
