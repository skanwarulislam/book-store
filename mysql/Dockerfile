FROM ubuntu:16.04 

RUN apt-get update \
  && apt-get install -y mysql-client curl \
  && apt-get clean \
  && rm -rf /var/cache/apt/archives
COPY scripts/ /tmp
