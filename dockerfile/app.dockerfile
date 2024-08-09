FROM php:8.1-fpm-alpine

WORKDIR /var/www/html

RUN apk update && apk add --no-cache \
    linux-headers \
    $PHPIZE_DEPS

RUN curl -sS https://getcomposer.org/installer | php \
        && mv composer.phar /usr/local/bin/ \
        && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

RUN pecl install xdebug

RUN docker-php-ext-install \
    pdo_mysql

COPY ./xdebug.ini "${PHP_INI_DIR}/conf.d"