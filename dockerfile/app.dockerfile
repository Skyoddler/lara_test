FROM php:8.1-fpm-alpine

WORKDIR /var/www/html

RUN docker-php-ext-install \
        pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php \
        && mv composer.phar /usr/local/bin/ \
        && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

COPY ./entrypoint/app_entrypoint.sh /entrypoint.sh

RUN chmod +x /entrypoint.sh

ENTRYPOINT ["sh", "/entrypoint.sh"]