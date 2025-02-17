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

# **Chạy Composer dưới user www-data**
RUN chown -R www-data:www-data /var/www/html \
    && su www-data -s /bin/bash -c "composer install --no-dev --optimize-autoloader"

# Copy toàn bộ mã nguồn vào container
COPY . .

# Tạo file .env nếu chưa có
RUN cp .env.example .env

# **Chạy lệnh Artisan dưới quyền www-data**
RUN chown -R www-data:www-data /var/www/html \
    && su www-data -s /bin/bash -c "php artisan key:generate" \
    && su www-data -s /bin/bash -c "php artisan cache:clear"

# Thiết lập quyền cho storage và bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# Cấu hình Apache
RUN a2enmod rewrite

# Chạy ứng dụng Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]

EXPOSE 8080
