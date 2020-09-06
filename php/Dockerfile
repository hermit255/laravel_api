FROM php:7.2.13-fpm-alpine
COPY --from=composer:1.8.6 /usr/bin/composer /usr/bin/composer
RUN cp /usr/local/etc/php/php.ini-development \
      /usr/local/etc/php/php.ini && \
    apk update && \
    docker-php-ext-install pdo_mysql
# install libraries
# RUN apk update && \
#     apk add
#         bash \
#         gcc \
#         icu \
#         icu-libs \
#         icu-dev \
#         wget \
#         vim \
#         zlib-dev \
#         libxml2-dev \
#         libpng-dev \
#         build-base \
#         autoconf \
#         nodejs \
#         npm \
#         freetype-dev \
#         libjpeg-turbo-dev \
#         libpng-dev \
#     && docker-php-source extract \
#     && docker-php-ext-install \
#         bcmath \
#         pdo \
#         pdo_mysql \
#         intl \
#         mbstring \
#         zip \
#         iconv \
#         xml \
#         gd \
