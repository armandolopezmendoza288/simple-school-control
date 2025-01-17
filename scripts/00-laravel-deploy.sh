#!/usr/bin/env bash
echo "Running dump-autoload"
composer dump-autoload

echo "Running optimize-autoloader --no-dev"
composer install --optimize-autoloader --no-dev

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