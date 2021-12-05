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
- `docker-compose exec app php artisan config:cache`
- `docker-compose exec app php artisan migrate`
- `docker-compose exec app php artisan db:seed`
- `docker-compose exec app php artisan storage:link`
- `docker-compose exec app php yarn install`
- `docker-compose exec app php yarn dev`

## How to connect ?: 
- Domain access local: 
  - `http://web.demo.localhost:${PROJECT_PORT}`
- Info connect database local with tool: 
  - `DB_HOST     = localhost`
  - `DB_DATABASE = ${DB_DATABASE}`
  - `DB_USERNAME = ${DB_USERNAME}`
  - `DB_PASSWORD = ${DB_PASSWORD}`
  - `DB_PORT     = ${DB_DOCKER_PORT}`

## Functions:
- User guest interface:
  - Home: list product and filter for guest user
  - Detail: detail product for guest user
  - Cart: cart with `Cache driver redis` (not yet `Checkout function`)
- Admin interface: (login with route `/login`) -> Product management page
  - Home: list product and filter for admin
  - Create: create a product
  - Edit: update a product information
  - Delete: delete a product

## Notes:

- Not yet brand management page... so i seed brand
- I seed a admin user with info:
  - email: `admin@gmail.com`
  - password: `password`