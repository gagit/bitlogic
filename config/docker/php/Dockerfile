FROM php:8.1.0-fpm as php81_pslq

#RUN apt update && apt install -y
RUN apt-get update \
    && apt-get install -y git acl openssl openssh-client wget zip vim libssh-dev \
    && apt-get install -y libpng-dev  libzip-dev libjpeg-dev libfreetype6-dev libicu-dev libpq-dev libxml2-dev \
    && apt-get install -y libssl-dev gnupg gnupg2
################

COPY php.ini /usr/local/etc/php/php.ini
#instalador de paquetes de php
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pgsql pdo_pgsql
#instalar paquetes de php
RUN install-php-extensions yaml xdebug gd intl @composer apcu xml  &&\
    docker-php-ext-enable --ini-name 06-yaml.ini yaml apcu gd intl xdebug

################
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
################
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - | echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
RUN apt update
RUN apt install yarn
################

WORKDIR /var/www/html/bitlogic/

