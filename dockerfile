# Sử dụng PHP 8.2 với Apache
FROM php:8.2-apache

# Cài đặt các extension cần thiết
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip unzip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mysqli

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Đặt thư mục làm việc
WORKDIR /var/www/html

# Copy file composer.json và composer.lock trước để cache dependencies
COPY composer.json composer.lock ./

# Chạy Composer để cài đặt dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy toàn bộ mã nguồn vào container
COPY . .

# Thiết lập quyền cho storage và bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Cấu hình Apache
RUN a2enmod rewrite

# Chạy ứng dụng Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]

EXPOSE 8080
