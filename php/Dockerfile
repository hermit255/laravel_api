FROM php:7.2.13-fpm-alpine AS composer_builder
WORKDIR /temp
# composer's' public key https://composer.github.io/pubkeys.html
ENV PUB="a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1"
RUN apk update && \
    apk add unzip git && \
    docker-php-ext-install pdo_mysql mysqli mbstring
RUN php -r "readfile('https://getcomposer.org/installer');" > composer-setup.php && \
php -r "if (hash_file('SHA384', 'composer-setup.php') === ${PUB}) { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
php composer-setup.php --filename=composer ;\
php -r "unlink('composer-setup.php');"


FROM php:7.2.13-fpm-alpine
COPY --from=composer_builder /temp/composer /usr/local/bin/composer
WORKDIR /temp
RUN cp /usr/local/etc/php/php.ini-development \
      /usr/local/etc/php/php.ini && \
    apk update && \
    docker-php-ext-install pdo_mysql
