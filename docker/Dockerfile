FROM ubuntu:20.04

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y libzip-dev
RUN apt-get update && apt-get install -y apt-utils 2>&1 | \
    grep -v "^debconf: delaying package configuration, since apt-utils.*"
RUN apt-get install redis-server curl vim nano -y

#install php
RUN apt-get install -y openssl zip unzip git \
    php \
    php-fpm \
    php-cli \
    php-common \
    php-mysql \
    php-json \
    php-curl \
    php-mysqlnd \
    php-pdo \
    php-xml \
    php-bcmath \
    php-zip \
    php-mbstring \
    php-xdebug \
    php-ast\
    php-redis\
    php-gd \
    php-zip

## Install Composer
RUN PATH=$HOME/bin:/usr/local/bin:/sbin:/usr/sbin:/bin:/usr/bin:${PATH}:$HOME/.local/bin
RUN export PATH
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

## Install nodejs + yarn
ENV NODE_VERSION=12.6.0
RUN apt install -y curl
RUN curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.37.2/install.sh | bash
ENV NVM_DIR=/root/.nvm
RUN . "$NVM_DIR/nvm.sh" && nvm install ${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm use v${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm alias default v${NODE_VERSION}
ENV PATH="/root/.nvm/versions/node/v${NODE_VERSION}/bin/:${PATH}"
RUN npm install -g yarn

## Install apache
RUN apt-get install apache2 -y
RUN rm /etc/php/7.4/apache2/php.ini
ADD php.ini /etc/php/7.4/apache2/

#Create folder code
RUN mkdir -p /var/www/html/project
RUN chown -R www-data:www-data /var/www/html/project
RUN chmod -R 755 /var/www/html/project

# config virtual host
ADD web_demo.conf /etc/apache2/sites-available/web_demo.conf
RUN a2ensite web_demo.conf
RUN a2enmod rewrite
#    && a2enconf apache2 \
#    && a2dissite 000-default \
#    && a2enmod actions \
#    && a2enmod deflate \
#    && a2enmod headers \
#    && a2enmod proxy \
#    && a2enmod proxy_http \
#    && a2enmod proxy_fcgi \
#    && a2enmod proxy_balancer \
#    && a2enmod proxy_connect \
#    && a2enmod rewrite \
#    && a2ensite vhost

WORKDIR /var/www/html/project

EXPOSE 80

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]