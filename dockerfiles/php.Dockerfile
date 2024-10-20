FROM php:8.2-fpm

WORKDIR /var/www/laravel

RUN apt update  \
    && apt upgrade -y mc git curl nodejs npm \
    && docker-php-ext-install bcmath

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./ini/php.ini /usr/local/etc/php/conf.d/php.ini

RUN useradd -m -s /bin/bash dima

USER dima
