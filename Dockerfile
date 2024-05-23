##
# NAME             : iadvize/php-convention
# VERSION          : latest
# DOCKER-VERSION   : 17.06
##

FROM php:7.3

COPY composer.* /app/

WORKDIR /app

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN apt update && apt install -y zip unzip

RUN composer install --ignore-platform-reqs --no-progress --no-interaction
