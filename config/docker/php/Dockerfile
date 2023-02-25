FROM php:7.4.16-fpm as php74_pslq

#RUN apt update && apt install -y
RUN apt-get update \
    && apt-get install -y git acl openssl openssh-client wget zip vim libssh-dev \
    && apt-get install -y libpng-dev  libzip-dev libjpeg-dev libfreetype6-dev libicu-dev libpq-dev libxml2-dev \
    && apt-get install -y libssl-dev gnupg gnupg2
################
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
&& curl https://packages.microsoft.com/config/debian/10/prod.list > /etc/apt/sources.list.d/mssql-release.list \
&& apt-get update
RUN ACCEPT_EULA=Y apt-get install -y msodbcsql18 mssql-tools18 unixodbc-dev
# optional: for bcp and sqlcmd
#RUN ACCEPT_EULA=Y apt-get install -y
#RUN 'export PATH="$PATH:/opt/mssql-tools18/bin"' >> ~/.bashrc
#RUN source ~/.bashrc
## optional: for unixODBC development headers
#RUN apt-get install -y
# optional: kerberos library for debian-slim distributions
# sudo apt-get install -y

COPY php.ini /usr/local/etc/php/php.ini
#instalador de paquetes de php
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pgsql pdo_pgsql
#instalar paquetes de php
RUN install-php-extensions yaml xdebug gd intl @composer apcu xml  &&\
    docker-php-ext-enable --ini-name 06-yaml.ini yaml apcu gd intl xdebug

#RUN pecl install sqlsrv
#RUN pecl install pdo_sqlsrv
#COPY sqlsrv.ini /usr/local/etc/php/conf.d/sqlsrv.ini
#COPY pdo_sqlsrv.ini /usr/local/etc/php/conf.d/pdo_sqlsrv.ini
#RUN docker-php-ext-enable  sqlsrv pdo_sqlsrv
#RUN phpenmod -v 7.4 sqlsrv pdo_sqlsrv

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

