FROM php:8.2-apache

RUN a2enmod rewrite

RUN docker-php-ext-install pdo pdo_mysql

COPY . /var/www/html/

EXPOSE 80

ini_set('display_errors', 0);
error_reporting(E_ALL);