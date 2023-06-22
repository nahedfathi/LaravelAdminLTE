FROM php:8.2.7-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli

COPY . /var/www/html/
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

RUN a2enmod rewrite

CMD ["apache2-foreground"]