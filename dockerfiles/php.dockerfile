FROM php:8.3-fpm-alpine

WORKDIR /var/www/html

# Install only necessary PHP extensions for MySQL
# pdo is a dependency for pdo_mysql
RUN docker-php-ext-install pdo pdo_mysql

COPY . .

# Create a non-root user for security
RUN addgroup -g 1000 appgroup && adduser -G appgroup -g appgroup -s /bin/sh -D appuser

# Switch to the non-root user
USER appuser