FROM php:8.2-fpm-alpine

RUN apk add --no-cache libpq-dev unzip zip && docker-php-ext-install pdo_pgsql pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

ENTRYPOINT ["./entrypoint.dev.sh"]

CMD ["php-fpm"]