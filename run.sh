#!/usr/bin/env bash

if [ "$1" = "build" ]; then
    docker-compose build
fi

if [ "$1" = "up" ]; then
    docker-compose up -d
fi

if [ "$1" = "down" ]; then
    docker-compose down
fi

if [ "$1" = "php" ]; then
    docker-compose run php-cli php app/$2
fi

if [ "$1" = "test" ]; then
    docker-compose run php-cli vendor/bin/phpunit
fi

if [ "$1" = "composer" ]; then
    docker-compose run composer $2
fi

if [ "$1" = "dump-autoload" ]; then
    docker-compose run composer dump-autoload -o
fi