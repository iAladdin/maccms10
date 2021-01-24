FROM php:7.4-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN set -eux; apt-get update; apt-get install -y libzip-dev zlib1g-dev libpng-dev openssh-server; docker-php-ext-install zip gd 

RUN PHP_VERSION=$(php -v | head -n1 | cut -d' ' -f2 | cut -d. -f1-2) \
    && mkdir -p /tmp/sourceguardian \
    && cd /tmp/sourceguardian \
    && curl -Os https://www.sourceguardian.com/loaders/download/loaders.linux-x86_64.tar.gz \
    && tar xzf loaders.linux-x86_64.tar.gz \
    && cp ixed.${PHP_VERSION}.lin "$(php -i | grep '^extension_dir =' | cut -d' ' -f3)/sourceguardian.so" \
    && echo "extension=sourceguardian.so" > /usr/local/etc/php/conf.d/15-sourceguardian.ini \
    && rm -rf /tmp/sourceguardian

COPY . /srv/app
COPY .docker/php/vhost.conf /etc/apache2/sites-available/000-default.conf


RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

RUN chown -R www-data:www-data /srv/app \
    && a2enmod rewrite

WORKDIR /srv/app