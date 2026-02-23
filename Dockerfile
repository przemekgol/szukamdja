FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . /var/www

RUN if [ ! -d vendor ]; then composer install --no-interaction --prefer-dist; fi
RUN cp .env.example .env || true
RUN php artisan key:generate || true
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache || true

CMD ["php-fpm"]
