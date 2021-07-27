FROM php:8.0-fpm

WORKDIR /var/www
RUN apt-get update && apt-get install -y \
    build-essential \
    libonig-dev \
    libpq-dev \
    libpng-dev \
    libzip-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/
RUN docker-php-ext-install gd
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN groupadd -g 1000 sammy
RUN useradd -u 1000 -ms /bin/bash -g sammy sammy
USER sammy

EXPOSE 9000
CMD ["php-fpm"]
