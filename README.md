## Proyecto Libreta (Backend)

This project was created using laravel version: 11.9
Composer version: 2.7.7
PHP version: 8.3

First clone the repository:
Run `git clone https://github.com/hmanueldd/libreta_backend.git`

Move into the folder
Run `cd name-of-folder`

## Install dependencies
Run `composer install`

## Database
Config your database before doing migrations:
You can use the example in the project and modify the section about database(DB_):
`cp .env.example .env`

Here are an example of .env file
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=capi
    DB_USERNAME=root
    DB_PASSWORD=123456

Generate artisan key
Run `php artisan key:generate`

## Run migrations and seeder
Run `php artisan migrate --seed`

## Run server
Run `php artisan serve`

check the port available, normally the app runs in http://127.0.0.1:8000