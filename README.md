
# Virtual Zoo

Проект **Virtual Zoo** — это веб-приложение для управления клетками и животными в зоопарке. Пользователи могут создавать, редактировать и удалять клетки, а также добавлять и просматривать животных в каждой клетке.

## Технологии

- **Backend**: Laravel 8+
- **Frontend**: Blade шаблоны, Bootstrap
- **База данных**: MySQL
- **Аутентификация**: Laravel Sanctum (для сессий и защиты API)

## Требования

- [PHP](https://www.php.net) (версии 7.4 или выше)
- [Composer](https://getcomposer.org)
- [MySQL](https://www.mysql.com)
- [Laravel](https://laravel.com)
- [WAMP](https://www.wampserver.com)

## Установка и настройка

### 1. Клонируйте репозиторий

```bash
git clone https://github.com/HromasDev/virtual-zoo.git
cd virtual-zoo
```

### 2. Установите зависимости

```bash
composer install
```

### 3. Настройте переменных окружения

Создайте базу данных MySQL для проекта (например, `virtual_zoo`).

Настройте параметры подключения в файле `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=virtual_zoo
DB_USERNAME=root
DB_PASSWORD=
APP_KEY=
```

Для безопасности приложения необходимо установить уникальный **App Key**:

```bash
php artisan key:generate
```

### 4. Миграции и сиды

Запустите миграции, чтобы создать таблицы в базе данных:

```bash
php artisan migrate
```

Для заполнения базы данных начальными данными (например, пользователя) используйте сиды:

```bash
php artisan db:seed
```

### 5. Настройте веб-сервер

Запустите сервер разработки Laravel:

```bash
php artisan serve
```

Проект будет доступен по адресу: `http://127.0.0.1:8000`.

### 6. Стартовое подключение

Для входа в систему используйте следующие учетные данные:

- **Email**: `admin@example.com`
- **Пароль**: `adminpassword`

Эти данные создаются при первом запуске через сиды.
