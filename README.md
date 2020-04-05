# seminovos-simple-api

## System dependencies to install php7 and composer

```sh
sudo apt install php7 composer php7-mbstring php7-curl
```

## Slim Framework 4 Skeleton Application

[![Coverage Status](https://coveralls.io/repos/github/slimphp/Slim-Skeleton/badge.svg?branch=master)](https://coveralls.io/github/slimphp/Slim-Skeleton?branch=master)

Use this skeleton application to quickly setup and start working on a new Slim Framework 4 application. This application uses the latest Slim 4 with Slim PSR-7 implementation and PHP-DI container implementation. It also uses the Monolog logger.

This skeleton application was built for Composer. This makes setting up a new Slim Framework application quick and easy.

## Create the Application

Run this command from the directory in which you want to install your new Slim Framework application.

```bash
composer create-project slim/slim-skeleton seminovos-simple-api
```

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` is web writable.

## Start the Application

Use `docker-compose` to run the app with `docker`, so you can run these commands:

```bash
cd seminovos-simple-api

composer install or composer update

docker-compose up -d
```

After that, open `http://localhost:8080` in your browser.

## Como filtar registros, todos os veiculos são semi novos

`http://localhost:8080/carro/?marca=audi&modelo=100&ano=2018-2021&preco=2000-1000000?pagina=2`
