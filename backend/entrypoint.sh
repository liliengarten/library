#!/bin/sh
set -e

composer install --prefer-dist --optimize-autoloader --no-scripts --no-interaction

php artisan migrate --seed --force

exec "$@"
