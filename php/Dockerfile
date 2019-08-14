FROM php:7.2.13-fpm-alpine
COPY --from=composer:1.8.6 /usr/bin/composer /usr/bin/composer
RUN cp /usr/local/etc/php/php.ini-development \
      /usr/local/etc/php/php.ini && \
    apk update && \
    docker-php-ext-install pdo_mysql
