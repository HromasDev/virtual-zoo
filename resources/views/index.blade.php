<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <h1 class="display-4 mb-4">Добро пожаловать в Виртуальный Зоопарк!</h1>
        <p class="lead mb-4">Здесь вы можете управлять клетками и животными, создавать новые клетки для животных, редактировать их и удалять.</p>

        <!-- Статистика по животным -->
        <div class="alert alert-info">
            <h4 class="alert-heading">Статистика:</h4>
            <p>В зоопарке на данный момент проживает <strong>{{ $animalCount }}</strong> животных.</p>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Управление клетками</h4>
                        <p class="card-text">Создавайте, редактируйте и удаляйте клетки для животных. Контролируйте вместимость и состояние клеток.</p>
                        <a href="{{ route('cages.index') }}" class="btn btn-primary">Перейти к клеткам</a>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Управление животными</h4>
                        <p class="card-text">Добавляйте, редактируйте и удаляйте животных в зоопарке. Просматривайте информацию о животных, включая их вид и возраст.</p>
                        <a href="{{ route('animals.index') }}" class="btn btn-success">Перейти к животным</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
