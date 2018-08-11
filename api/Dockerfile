# Image to use 
FROM ubuntu:16.04

MAINTAINER Anwarul Islam <sk.anwarul.islam@gmail.com>

## Update repository install necessary packages for running 
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
## Copy necessary files and directories to build the source code.
COPY Makefile composer.json composer.lock ./
COPY public ./public
COPY routes ./routes
COPY config ./config
COPY models ./models
RUN cd /srv/test && make check-composer
RUN cd /srv/test && composer install
EXPOSE 8080
## TODO RUN nginx instead of php default server for production
CMD  ["php","-S", "0.0.0.0:8080", "-t", "./public", "./public/index.php"]
