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

# Copiar los archivos del proyecto al contenedor
COPY . /var/www/html

# Instalar dependencias de Composer
RUN composer install

# Establecer los permisos correctos para el almacenamiento y el caché
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Configuración de permisos
RUN mkdir -p database && touch database/database.sqlite && \
    chmod -R 775 database
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html

# Cambiar el DocumentRoot para que apunte a la carpeta "public"
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Agregar ServerName para evitar el error de Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Ejecutar las migraciones y el seeder
RUN php artisan migrate:fresh --seed --force

# Exponer el puerto 80
EXPOSE 80

# Comando predeterminado
CMD ["apache2-foreground"]