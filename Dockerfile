FROM serversideup/php:8.4-fpm-nginx-alpine



# compile native PHP packages
RUN docker-php-ext-install \
    gd \
    pcntl \
    bcmath \
    mysqli \
    pdo_mysql \
    intl

# configure packages
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
# install additional packages from PECL

RUN pecl channel-update pecl.php.net && \
    pecl install redis igbinary msgpack  mongodb opcache && \
    docker-php-ext-enable redis igbinary msgpack mongodb opcache



COPY . /var/www/app

WORKDIR /var/www/app

RUN composer install --no-dev --optimize-autoloader