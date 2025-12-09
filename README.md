## Тестовое приложение на Laravel

## Установка

1. Клонировать репозиторий:

```bash
git clone <репозиторий>
cd products-app-test
```

## Установить зависимости:

```bash
composer install
```

## Создать .env (скопировать с .env.example) и настроить БД:

```bash
cp .env.example .env
php artisan key:generate
```

## Настроить базу данных в .env:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=products_app_test
DB_USERNAME=root
DB_PASSWORD=
```

## Выполнить миграции и сид:

```bash
php artisan migrate --seed
## Security Vulnerabilities
```

## Запуск

```bash
php artisan serve
```

# Страница доступна по http://127.0.0.1:8000/products

## Тестирование

Для запуска тестов используется PHPUnit.

```bash
php artisan test
```
