FROM php:8.2-fpm-alpine

ARG user
ARG uid

RUN apk update && apk add \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    shadow  # Add shadow package to install useradd

RUN docker-php-ext-install pdo pdo_mysql \
    && apk --no-cache add nodejs npm

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

USER root

RUN chmod 777 -R /var/www/
RUN if ! getent group www-data; then addgroup -g 82 www-data; fi && \
    useradd -G www-data,root -u $uid -d /home/$user $user

RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user
WORKDIR /var/www
RUN chown -R $user:$user /var/www

RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan optimize && \
    php artisan event:cache

USER $user


#FROM php:8.0.5
#RUN apt-get update -y && apt-get install -y openssl zip unzip git
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#RUN docker-php-ext-install pdo_mysql
#WORKDIR /app
#COPY . /app
#RUN composer install --optimize-autoloader --no-dev
#CMD php artisan serve
#EXPOSE $PORT
