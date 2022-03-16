FROM php:8.0-apache

COPY ./src /var/www/html/
COPY ./config/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite
RUN docker-php-ext-install pdo pdo_mysql
