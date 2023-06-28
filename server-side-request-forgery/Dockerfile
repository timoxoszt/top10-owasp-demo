FROM php:7.2-apache

WORKDIR /var/www/html

COPY src/ /var/www/html/

# Set up permissions for owner
RUN chown -R www-data:www-data /var/www/html