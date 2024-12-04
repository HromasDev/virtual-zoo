<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать клетку</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Редактировать клетку</h1>

        <form action="{{ route('cages.update', $cage->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Название клетки</label>
                <input type="text" name="name" value="{{ old('name', $cage->name) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="capacity" class="form-label">Вместимость клетки</label>
                <input type="number" name="capacity" value="{{ old('capacity', $cage->capacity) }}" class="form-control" required>
                @if ($errors->has('capacity'))
                    <div class="text-danger mt-2">
                        <strong>{{ $errors->first('capacity') }}</strong>
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>

        <a href="{{ route('cages.index') }}" class="btn btn-secondary mt-3">Назад</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
