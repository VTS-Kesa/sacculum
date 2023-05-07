FROM php:8.2-apache

MAINTAINER Zvonimir Rudinski <zvonimir.rudinski@noubis.com>

RUN apt-get update && apt-get install -y \
    libpq-dev

# Enable apache modules
RUN a2enmod rewrite

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application files
RUN mkdir -p /var/www/html
COPY . /var/www/html

# Install dependencies
RUN composer install --no-interaction --no-dev --no-scripts --optimize-autoloader

# Set working directory
WORKDIR /var/www/html

# Expose port 80
EXPOSE 80

# Run Apache
CMD ["apache2-foreground"]
