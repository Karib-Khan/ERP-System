FROM php:8.2-apache

# Install PHP MySQL extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache rewrite
RUN a2enmod rewrite

# Copy public files
COPY public/ /var/www/html/

WORKDIR /var/www/html/
