##
# NAME             : iadvize/php-convention
# VERSION          : latest
# DOCKER-VERSION   : 17.06
##

FROM php:7.3

COPY composer.* /app/

WORKDIR /app

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"

RUN mv composer.phar /usr/local/bin/composer

RUN apt update && apt install -y zip unzip

RUN composer install --ignore-platform-reqs --no-progress --no-interaction
