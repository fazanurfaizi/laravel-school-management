ARG PHP_VERSION
FROM php:${PHP_VERSION}-alpine

LABEL maintainer="Faza Nurfaizi <nurfaizi.faza@gmail.com>"

RUN apk --update add wget \
    curl \
    git \
    build-base \
    libmemcached-dev \
    libmcrypt-dev \
    libxml2-dev \
    pcre-dev \
    zlib-dev \
    autoconf \
    cyrus-sasl-dev \
    libgsasl-dev \
    oniguruma-dev \
    openssl \
    openssl-dev \
    supervisor

RUN docker-php-ext-install mysqli mbstring pdo pdo_mysql tokenizer xml pcntl

RUN if [ $(php -r "echo PHP_MAJOR_VERSION;") = "5" ]; then \
  pecl channel-update pecl.php.net && pecl install memcached-2.2.0 mcrypt-1.0.1 && docker-php-ext-enable memcached \
;else \
  pecl channel-update pecl.php.net && pecl install memcached mcrypt-1.0.1 && docker-php-ext-enable memcached \
;fi


RUN addgroup -g 1000 laravel && \
    adduser -D -G laravel -u 1000 laravel

RUN pecl install redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

COPY supervisord.conf /etc/supervisord.conf

ENTRYPOINT ["/usr/bin/supervisord", "-n", "-c",  "/etc/supervisord.conf"]

# Clean up
RUN rm /var/cache/apk/* \
    && mkdir -p /var/www

WORKDIR /etc/supervisord/conf.d/
