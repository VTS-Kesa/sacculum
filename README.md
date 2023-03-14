# Sacculum
Sacculum (***Latin for bag***) is my project for the Web Programming class of 2023.

## Requirements
- Docker
- Node
- pnpm

## Setup
To run the application you first need to setup the environment. In each folder (along with the project root) is an `.env.example` file which details variables you need to set.

Copy `.env.example` to `.env` and set the variables.

After that run `docker-compose up -d` to run the database and the API.

To install the API packages run `docker-compose exec php bash`
1. `cd /app`
2. `composer install`

Both have exposed ports and you can find the API on `http://localhost:8080`

To run the frontend change the directory and run `pnpm i`.

After installing the packages run `pnpm dev`. Your frontend will be on `http://localhost:3000`

## Running tests
To run the frontend tests, just run `pnpm test`.

To run the API tests, start the API in Docker, install the dependencies and run `docker-compose exec php bash`
1. `cd /app`
2. `./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/`
