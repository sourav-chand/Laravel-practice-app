FROM php:8.4-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends git libsqlite3-dev pkg-config unzip \
    && docker-php-ext-install pdo_sqlite \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

COPY --chown=www-data:www-data . /var/www/html
COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN mkdir -p database \
    && touch database/database.sqlite \
    && chown -R www-data:www-data storage bootstrap/cache database

COPY docker/entrypoint.sh /usr/local/bin/app-entrypoint
RUN chmod +x /usr/local/bin/app-entrypoint

EXPOSE 80

ENTRYPOINT ["app-entrypoint"]
CMD ["apache2-foreground"]
