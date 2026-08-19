#!/bin/sh
set -eu

mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views bootstrap/cache database
touch database/database.sqlite
chown -R www-data:www-data storage bootstrap/cache database

php artisan migrate --force --no-interaction

exec "$@"
