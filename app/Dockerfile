# Image to use 
FROM node:9.6.1 as builder
MAINTAINER Anwarul Islam <sk.anwarul.islam@gmail.com>
RUN DEBIAN_FRONTEND=noninteractive apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y \
        nginx \
        curl \
	make \
        build-essential \
    && \
    rm -rf /var/lib/apt/lists/* /var/cache/apt/archives/*
WORKDIR /srv/api
COPY package.json ./
COPY public ./public
COPY src ./src
RUN cd /srv/api && npm install && npm run build
EXPOSE 3000
CMD  ["npm","start"]
