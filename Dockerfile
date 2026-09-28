FROM php:8.4-apache

RUN apt-get update && apt-get install -y libpq-dev unzip git && docker-php-ext-install pdo pdo_pgsql

RUN a2enmod rewrite

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN chown -R www-data:www-data storage bootstrap/cache

RUN sed -i "s|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|" /etc/apache2/sites-available/000-default.conf
RUN printf "<Directory /var/www/html/public>\\n    AllowOverride All\\n    Require all granted\\n</Directory>\\n" >> /etc/apache2/apache2.conf

EXPOSE 80
