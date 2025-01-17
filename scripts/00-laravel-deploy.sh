#!/usr/bin/env bash
echo "Here's php and composer versions"
php -v
composer -v

echo "Running optimize-autoloader --no-dev"
composer install --optimize-autoloader --no-dev

echo "updating composer to version 2"
composer self-update --2

echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

echo "Running composer update"
composer update

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force