FROM ubuntu:14.04
RUN apt-get -y install software-properties-common
RUN apt-add-repository ppa:phalcon/stable
RUN apt-get update
RUN apt-get -y install git nginx nginx-extras php5-dev php5-fpm libpcre3-dev gcc make php5-mysql php5-phalcon

ADD nginx/default /etc/nginx/sites-available/default

RUN echo "<?php phpinfo(); ?>" > /usr/share/nginx/html/index.php

EXPOSE 80

CMD service php5-fpm start && nginx -g 'daemon off;'