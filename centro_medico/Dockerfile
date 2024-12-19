FROM php:8.2-apache

# Instalar dependencias para extensiones PHP
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip libpng-dev libonig-dev curl git \
    && docker-php-ext-install pdo_mysql mbstring zip gd

# Habilitar mod_rewrite para Laravel
RUN a2enmod rewrite

# Copiar el código al contenedor
COPY . /var/www/html

# Ajustar permisos
RUN chown -R www-data:www-data /var/www/html

# Ajustar Apache para que apunte a la carpeta public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Generar la key de la aplicación, cachear configuración (opcional si quieres)
RUN php artisan key:generate
RUN php artisan config:cache

EXPOSE 80
CMD ["apache2-foreground"]
