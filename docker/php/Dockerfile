# Use image which contains apache with php
FROM php:7.4.10-apache
RUN apt-get update && apt-get upgrade -y
# Install packages needed to install php extensions
RUN apt-get install git zlib1g-dev libxml2-dev libzip-dev zip unzip -y
# Install PHP extensions
RUN docker-php-ext-install zip intl mysqli pdo pdo_mysql opcache
# Install NPM
RUN apt-get install npm -y
# Upgrade npm to latest version
RUN npm install -g npm
# Install node manager - n
RUN npm install -g n
# Install latest stable node version
RUN n stable
# Install sass compiler
RUN npm install -g sass
# Install XDEBUG
RUN pecl install xdebug-2.9.6 && docker-php-ext-enable xdebug

#configure xdebug var_dump debug details
RUN echo 'xdebug.var_display_max_children=-1' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.var_display_max_depth=-1' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.var_display_max_data=-1' >> /usr/local/etc/php/php.ini

# Install composer command
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer