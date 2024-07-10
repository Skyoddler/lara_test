FROM php:8.1-fpm-alpine

WORKDIR /var/www/html

COPY src .

RUN docker-php-ext-install \
        pdo_mysql \
        mysqli \
        mbstring \
        intl \
        xml \
        opcache \
        zip \
        bcmath \
        imap \
        exif \
        pcntl
