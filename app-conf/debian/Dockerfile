FROM debian:buster-slim
RUN apt-get update

RUN apt-get install iputils-ping apache2 apache2-utils -y
RUN apache2ctl stop
RUN rm -f /var/www/html/index.html

RUN apt-get install php php-cgi php-cli php-pear php-mysql php-mbstring php-xml php-fpm php-gd -y
RUN apt-get install curl libcurl4 libcurl4-openssl-dev php-curl -y
RUN apt-get install libapache2-mod-php -y

RUN        apt-get -y install supervisor && \
           mkdir -p /var/log/supervisor && \
           mkdir -p /etc/supervisor/conf.d
RUN        mkdir /var/log/supervisord
COPY supervisor/supervisor.conf /etc/supervisor.conf

COPY php-fpm/php.ini /usr/local/etc/php/
COPY php-fpm/php-fpm.conf /usr/local/etc/php-fpm.d/php-fpm.conf

WORKDIR /var/www/html
CMD /usr/bin/supervisord -n -c /etc/supervisor.conf
RUN apt-get install ffmpeg smartmontools net-tools -y

COPY apache2/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY apache2/apache2.conf /etc/apache2/apache2.conf

RUN apache2ctl restart
