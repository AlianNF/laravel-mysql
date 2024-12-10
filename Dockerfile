# Usar la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip curl git libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer el directorio de trabajo en /var/www/html
WORKDIR /var/www/html

# Copiar archivos de composición primero para cachear dependencias
COPY composer.json composer.lock ./

# Instalar dependencias de Composer sin scripts
RUN composer install --no-scripts --no-autoloader

# Copiar el resto de los archivos del proyecto
COPY . .

# Generar autoload de Composer
RUN composer dump-autoload --optimize

# Establecer permisos
RUN mkdir -p storage bootstrap/cache database \
    && touch database/database.sqlite \
    && chmod -R 775 storage bootstrap/cache database \
    && chown -R www-data:www-data /var/www/html

# Configurar Apache para el directorio público de Laravel
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Generar clave de aplicación
RUN php artisan key:generate

# Exponer el puerto 80
EXPOSE 80

# Comando predeterminado
CMD ["apache2-foreground"]