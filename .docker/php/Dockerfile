FROM php:7.4-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN set -eux; apt-get update; apt-get install -y libzip-dev zlib1g-dev libpng-dev; docker-php-ext-install zip gd 


COPY . /srv/app
COPY .docker/php/vhost.conf /etc/apache2/sites-available/000-default.conf


RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libmcrypt-dev \
    libpng12-dev \
    libjpeg-dev \
    libpng-dev \
    && docker-php-ext-install iconv mcrypt \
    && docker-php-ext-configure gd \
    --enable-gd-native-ttf \
    --with-freetype-dir=/usr/include/freetype2 \
    --with-png-dir=/usr/include \
    --with-jpeg-dir=/usr/include \
    && docker-php-ext-install gd \
    && docker-php-ext-install mbstring \
    && docker-php-ext-enable gd

RUN chown -R www-data:www-data /srv/app \
    && a2enmod rewrite

WORKDIR /srv/app