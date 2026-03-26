#!/bin/sh
set -e

composer install --prefer-dist --optimize-autoloader --no-scripts --no-interaction

chmod -R 777 storage/ bootstrap/cache/

php artisan migrate --seed --force

exec "$@"
