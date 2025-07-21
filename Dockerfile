FROM serversideup/php:8.4-fpm-nginx-alpine


COPY . /var/www/app

WORKDIR /var/www/app

RUN composer install --no-dev --optimize-autoloader