FROM php:8-apache

RUN apt-get update && \
    apt-get install -y curl unzip && \
    docker-php-ext-install pdo pdo_mysql && \
    curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    a2enmod rewrite && \
    sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf && \
    sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

COPY . /var/www/html

# Install dependencies
RUN composer install --no-interaction --no-dev --optimize-autoloader

# Change permissions
RUN chown -R www-data:www-data /var/www/html && \ 
    chmod -R 775 storage bootstrap/cache