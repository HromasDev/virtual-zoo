<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать клетку</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Создать клетку</h1>

        <form action="{{ route('cages.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Название клетки:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="capacity" class="form-label">Вместимость:</label>
                <input type="number" name="capacity" id="capacity" class="form-control" required min="1">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Создать клетку</button>
            </div>
        </form>

        <a href="{{ route('cages.index') }}" class="btn btn-secondary">Вернуться к клеткам</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>