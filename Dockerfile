FROM php:8.1-cli

RUN apt-get update

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN curl -sS https://getcomposer.org/installer​ | php -- \
    --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . /app

RUN php -m
RUN composer install

EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000