FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip libpng-dev libonig-dev curl git \
    && docker-php-ext-install pdo_mysql mbstring zip gd

RUN a2enmod rewrite

COPY . /var/www/html
RUN chown -R www-data:www-data /var/www/html
WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

RUN php artisan key:generate
RUN php artisan config:cache

# Puesto que es un microservicio, podemos correr el servidor embebido de PHP
EXPOSE 8001
CMD ["php", "-S", "0.0.0.0:8001", "-t", "public"]
