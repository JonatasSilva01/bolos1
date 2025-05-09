#!/bin/bash

echo "Copiando .env.docker para .env..."
cp .env.docker .env

echo "Subindo containers com Docker Compose..."
docker-compose up -d --build

echo "Instalando dependências..."
docker exec -it laravel_app composer install

echo "Rodando migrations..."
docker exec -it laravel_app php artisan migrate

echo "Tudo pronto! Acesse em http://localhost:8000"
