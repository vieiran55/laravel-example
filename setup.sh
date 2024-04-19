#!/bin/bash

# Copie o arquivo .env.example para .env
cp .env.example .env

# Gere a chave de aplicativo
php artisan key:generate
