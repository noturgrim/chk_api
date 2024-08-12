# Use the official PHP image
FROM php:8.1-apache

# Copy your application code to the container
COPY . /var/www/html/

# Copy the custom entrypoint script
COPY entrypoint.sh /usr/local/bin/entrypoint.sh

# Make the entrypoint script executable
RUN chmod +x /usr/local/bin/entrypoint.sh

# Set the working directory
WORKDIR /var/www/html/

# Expose port 80
EXPOSE 80

# Set the custom entrypoint script
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
