# How to Running Application

## Install module laravel
```
composer install
```

## Set env file mysql
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=capital
DB_USERNAME=root
DB_PASSWORD=root
```

## Running migration
```
php artisan migrate
```

## Running seeder artikel
```
php artisan db:seed--class=DatabaseSeeder
```

## Running Application
```
php artisan serve
```