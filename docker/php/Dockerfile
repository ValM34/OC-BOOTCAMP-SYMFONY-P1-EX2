FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
    postgresql-dev \
    linux-headers \
    $PHPIZE_DEPS

RUN docker-php-ext-install pdo pdo_pgsql intl

# Créer un utilisateur avec le même UID que votre utilisateur local (à cause des problèmes de permissions du dossier var/log/)
RUN deluser www-data && \
    addgroup -g 1000 www-data && \
    adduser -u 1000 -D -G www-data www-data && \
    mkdir -p /var/www/html/var/log && \
    chown -R www-data:www-data /var/www/html

WORKDIR /var/www/html

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
