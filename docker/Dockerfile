FROM php:8.2-apache

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y git
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions gd mysqli bcmath zip mbstring xml json tokenizer redis
COPY --from=composer:2.0 /usr/bin/composer /usr/local/bin/composer

RUN git clone https://github.com/andrasweb/fotex.git /var/www/html
WORKDIR /var/www/html

RUN cd /var/www/html && git config --global --add safe.directory /var/www/html && git rev-parse HEAD > /var/www/html/public/version.html
RUN rm -r /var/www/html/.git
RUN chmod -R 777 storage && chmod -R 777 bootstrap && chmod -R 777 bootstrap/cache && chmod -R 777 public
