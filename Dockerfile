FROM composer:2 AS composer-dependencies
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

FROM node:22 AS frontend-assets
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY resources ./resources
COPY vite.config.js ./
RUN npm run build

FROM php:8.3-cli
WORKDIR /var/www/html

RUN apt-get update \
    && apt-get install -y --no-install-recommends libonig-dev libsqlite3-dev \
    && docker-php-ext-install mbstring pdo_sqlite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer-dependencies /app/vendor ./vendor
COPY --from=frontend-assets /app/public/build ./public/build
COPY . .

RUN mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && chmod -R ug+rw storage bootstrap/cache

ENV APP_ENV=production
ENV APP_DEBUG=false
ENV SESSION_DRIVER=cookie
ENV CACHE_STORE=array
ENV QUEUE_CONNECTION=sync

EXPOSE 10000
CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"]
