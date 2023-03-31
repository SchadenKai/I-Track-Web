FROM php:8.0-apache

# Install pg-sql php extension
RUN apt-get update
RUN apt-get install -y libpq-dev && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && docker-php-ext-install pgsql