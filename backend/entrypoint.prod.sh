#!/bin/sh
set -e

chmod -R 777 storage/ bootstrap/cache/

php artisan migrate --seed --force

exec "$@"
