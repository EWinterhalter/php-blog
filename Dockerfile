FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    unzip \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

WORKDIR /var/www/html

CMD php artisan serve --host=0.0.0.0 --port=8000
