ARG PHP_VERSION
FROM php:${PHP_VERSION}-fpm

LABEL maintainer="Faza Nurfaizi <nurfaizi.faza@gmail.com>"

# Installing Dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    build-essential \
    default-mysql-client \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libmagickwand-dev \
    libzip-dev \
    libonig-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle

RUN pecl install redis

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Installing extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath opcache
RUN docker-php-ext-enable redis

# Changing Workdir
WORKDIR /var/www/laravel-examine
