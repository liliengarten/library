FROM php:8.2-fpm-alpine

RUN apk add --no-cache libpq-dev unzip zip && docker-php-ext-install pdo_pgsql pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY ./backend/composer.json ./backend/composer.lock ./

RUN composer install --no-dev --prefer-dist --optimize-autoloader --no-scripts --no-interaction

COPY --chmod=755 ./backend .

RUN chown -R www-data:www-data storage/ bootstrap/cache/ && chmod -R 775 storage/ bootstrap/cache/

ENTRYPOINT ["./entrypoint.sh"]

CMD ["php-fpm"]
