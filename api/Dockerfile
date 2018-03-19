# Image to use 
FROM ubuntu:16.04

MAINTAINER Anwarul Islam <sk.anwarul.islam@gmail.com>
RUN DEBIAN_FRONTEND=noninteractive apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y \
        composer \
        nginx \
        curl \
	make \
        php \
        php-fpm \
        php-mysql \
        php-mbstring \
    && \
    rm -rf /var/lib/apt/lists/* /var/cache/apt/archives/*
WORKDIR /srv/test
COPY Makefile composer.json composer.lock ./
COPY public ./public
COPY routes ./routes
COPY config ./config
COPY models ./models
RUN cd /srv/test && make check-composer
RUN cd /srv/test && composer install
EXPOSE 8080
CMD  ["php","-S", "0.0.0.0:8080", "-t", "./public", "./public/index.php"]
