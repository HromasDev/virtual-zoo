<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать животное</title>
    <!-- Подключение Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Редактировать животное</h1>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('animals.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="species" class="form-label">Вид:</label>
                <input type="text" id="species" name="species" class="form-control" value="{{ $animal->species }}" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Имя:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $animal->name }}" required>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Возраст:</label>
                <input type="number" id="age" name="age" class="form-control" value="{{ $animal->age }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Описание:</label>
                <textarea id="description" name="description" class="form-control" required>{{ $animal->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="cage_id" class="form-label">Выберите клетку:</label>
                <select id="cage_id" name="cage_id" class="form-select" required>
                    @foreach ($cages as $cage)
                        <option value="{{ $cage->id }}"
                            @if($cage->id == $animal->cage_id) selected @endif>
                            {{ $cage->name }} ({{ $cage->capacity - $cage->animals->count() }} мест свободно)
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Изображение:</label>
                <input type="file" id="image" name="image" class="form-control">
                @if($animal->image)
                    <img src="{{ asset('storage/' . $animal->image) }}" alt="Изображение животного" class="mt-3" style="max-width: 200px;">
                @endif
            </div>


            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            <a href="{{ route('animals.index') }}" class="btn btn-secondary">Назад</a>
        </form>
    </div>

    <!-- Подключение Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
