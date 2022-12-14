## Neology

A company requires a system to have basic information about their employees at any time containing files that are important for the enrollment process. As part of the PI Department you were selected to develop this project.

## Requirements

- Docker 20.10.20 or greater
- Docker compose v2.12.1 or greater

If you are not using docker

- PHP 8.1 or greater
- MySQL 8.0 or greater
- NGINX

For more details take a look in to the following URL: https://laravel.com/docs/9.x/deployment#server-requirements


## Clone project

```shell
git clone https://github.com/jsalazarv/neology-api.git
```

## Copy .env file and set your env vars
```shell
cp .env.example .env
```

## At the very first time run the following command
```shell
docker run --rm --interactive --tty -v $(pwd):/app composer install
```

## Run sail up
```shell
sail up -d
```

## Run migrations and seeders
```shell
sail artisan migrate:fresh --seed
```

## Configure your filesystem storage
```shell
sail artisan storage:link
```

This project will start listening in: http://localhost/ by default. 
You can make request using the Postman collection provided at the route directory of this project
