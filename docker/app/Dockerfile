
# FROM php:7.4.1-fpm-alpine
FROM php:fpm-alpine

# COPY php.ini
COPY ./php.ini /usr/local/etc/php/php.ini
COPY ./20-xdebug.ini /usr/local/etc/php/conf.d/20-xdebug.ini

# Composer install
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

# install Node.js
COPY --from=node:10.22 /usr/local/bin /usr/local/bin
COPY --from=node:10.22 /usr/local/lib /usr/local/lib

# alpine ベースのイメージでなければ autoconf gcc g++ make は不要
RUN set -ex \
    && apk update \
    && apk --no-cache add git zip unzip vim \
        autoconf gcc g++ make \
        postgresql-dev \
    && rm -rf /var/cache/apt \
    && docker-php-ext-install pdo pdo_pgsql bcmath \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

WORKDIR /var/www/html
