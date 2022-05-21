FROM php:7.4-apache

RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql

RUN docker-php-ext-install pdo pdo_mysql
COPY my-php-files/ /var/www/html/