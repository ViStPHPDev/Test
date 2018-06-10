FROM php:7.2-fpm-alpine
MAINTAINER ViSt <vist.prim@gmail.com>

RUN apk update && apk add build-base

RUN apk add --no-cache gettext-dev icu-dev curl-dev bash mc \
  && docker-php-ext-install intl curl

RUN apk add zlib-dev git zip \
  && docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php \
        && mv composer.phar /usr/local/bin/ \
        && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

WORKDIR /app
COPY ./ ./
COPY ./deploy/php.ini /usr/local/etc/php

ENV PATH="~/.composer/vendor/bin:./vendor/bin:${PATH}"

CMD ["sh", "-c", "composer install --prefer-source --no-interaction ; php-fpm"]
