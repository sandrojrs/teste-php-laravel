# Use the official PHP image with Alpine Linux
FROM php:8.1-alpine

# Install necessary dependencies
RUN apk --no-cache add \
    curl \
    libzip-dev \
    unzip

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www/html

# Copy the rest of the application code
COPY . /var/www/html/

# Install project dependencies
RUN composer install

# Set the correct permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80 for the built-in PHP server
EXPOSE 80

# Start the PHP built-in server
COPY ./run.sh /tmp    
ENTRYPOINT ["/tmp/run.sh"]