FROM ubuntu:latest

RUN apt-get update
RUN apt-get install -y graphviz php5

ADD index.php /root/index.php

WORKDIR /root

EXPOSE 80

CMD php -S 0.0.0.0:80 
