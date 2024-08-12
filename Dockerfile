# Use the official PHP image
FROM php:8.1-apache

# Copy your application code to the container
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html/

# Expose port 80
EXPOSE 80
