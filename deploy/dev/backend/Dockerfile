FROM php:8.2-fpm-alpine

RUN apk add --no-cache libpq-dev unzip zip && docker-php-ext-install pdo_pgsql pgsql

WORKDIR /app

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY backend/composer.json backend/composer.lock ./
RUN composer install --prefer-dist --optimize-autoloader --no-scripts --no-interaction

COPY backend/ .

ENTRYPOINT ["./entrypoint.dev.sh"]

CMD ["php-fpm"]