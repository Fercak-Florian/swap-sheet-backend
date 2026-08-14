# ---------- Stage 1 : dépendances Composer ----------
FROM composer:2 AS composer_build

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --no-scripts \
    --no-autoloader \
    --prefer-dist \
    --no-interaction

COPY .. .

RUN composer dump-autoload \
    --optimize \
    --no-dev \
    --classmap-authoritative

# Installation des assets ImportMap
# RUN php bin/console importmap:install --env=prod


# ---------- Stage 2 : image PHP-FPM finale ----------
FROM php:8.4-fpm-alpine

RUN apk add --no-cache \
        icu-dev \
        libzip-dev \
        zip \
        unzip \
        git \
    && docker-php-ext-install \
        pdo_mysql \
        intl \
        opcache \
        zip

WORKDIR /var/www/symfony

COPY --from=composer_build /app ./

ENV APP_ENV=prod
ENV APP_DEBUG=0

#RUN php bin/console asset-map:compile

RUN mkdir -p var/cache var/log
RUN chown -R www-data:www-data var
RUN chmod -R 775 var

USER www-data

EXPOSE 9000

CMD ["php-fpm"]
