FROM php:8.1.2-fpm

ENV LANG=es_ES.UTF-8 \
		LANGUAGE=es_ES.UTF-8

RUN docker-php-ext-install mysqli pdo_mysql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer