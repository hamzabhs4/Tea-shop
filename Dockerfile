# Base image PHP مع FPM
FROM php:8.1-fpm

# تثبيت الأدوات اللازمة
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    zip \
    npm

# تثبيت composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev

RUN npm install && npm run build

RUN php artisan key:generate

RUN php artisan migrate --force

CMD ["php-fpm"]
