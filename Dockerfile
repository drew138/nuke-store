# Use the official PHP image as base image
FROM php:8.1-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install required system dependencies
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    libzip-dev \
    unzip \
    git

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy composer.json and composer.lock
COPY ./src/composer.json /var/www/html
COPY ./src/composer.lock /var/www/html

# Install application dependencies with Composer
RUN composer install  --prefer-dist --no-scripts --no-progress --no-suggest && \
    rm -rf /root/.composer

# Copy application files to working directory
COPY ./src /var/www/html

# Install PHP extensions
RUN docker-php-ext-install zip pdo pdo_mysql bcmath opcache

# Copy Nginx and Supervisor configurations
COPY ./docker/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expose port 80 for Nginx
EXPOSE 80

RUN mkdir -p /var/log/nginx
RUN mkdir -p /var/www/html/storage
RUN mkdir -p /var/www/html/bootstrap/cache

RUN chmod -R 777 /var/www/html/storage
RUN chmod -R 777 /var/www/html/storage/*
RUN chmod -R 777 /var/www/html/bootstrap/cache


# Start supervisord to manage Nginx and PHP-FPM processes
CMD ["supervisord", "-n", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
