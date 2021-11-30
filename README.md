# Demo Product Page

## Tech
- Laravel 7.x
- Php 7.4
- Mysql 5.5
- docker 20.10.8
- docker-compose 1.29.2

## Setup
- `echo '127.0.0.1 web.demo.localhost' | sudo tee -a /etc/hosts`
- `cp .env.example .env`
- change `PROJECT_PATH = root folder project` (in .env file)
- `docker-compose up --build`
- `docker-compose exec app composer install`
- `docker-compose exec app php artisan key:generate`
- `docker-compose exec app php artisan cache:clear`
- `docker-compose exec app php artisan config:clear`
- `docker-compose exec app php artisan migrate`

## How to connect ?: 
- Domain access local: 
  - `http://web.demo.localhost:${PROJECT_PORT}`
- Info connect database local: 
  - `DB_HOST     = localhost`
  - `DB_DATABASE = ${DB_DATABASE}`
  - `DB_USERNAME = ${DB_USERNAME}`
  - `DB_PASSWORD = ${DB_PASSWORD}`
  - `DB_PORT     = ${DB_DOCKER_PORT}`
