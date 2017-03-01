FROM php:7.0-apache

WORKDIR /var/www

# Install system dependencies
RUN curl -sL https://deb.nodesource.com/setup_6.x | bash -
RUN apt-get install -y \
    wget \
    vim \
    libpng12-dev \
    git \
    unzip \
    nodejs
COPY install-composer.sh /root
RUN /root/install-composer.sh

# Configure PHP
RUN docker-php-ext-install pdo_mysql

# Configure Apache
RUN a2enmod rewrite

# Configure Environment
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
