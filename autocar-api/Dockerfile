FROM php:7.3-fpm

COPY composer.lock composer.json /var/www/

WORKDIR /var/www

VOLUME [ "/var/www" ]

RUN apt-get update && apt-get install -y build-essential \
  libpng-dev \
  libjpeg62-turbo-dev \
  libfreetype6-dev \
  locales \
  zip \
  jpegoptim optipng pngquant gifsicle \
  unzip \
  git \
  curl \
  vim \
  libzip-dev

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/user/include \
  --with-jpeg-dir=/usr/include --with-png-dir=/usr/include
RUN docker-php-ext-install gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

RUN chown -R www:www . /var/www

RUN chmod -R 755 .

USER www

EXPOSE 9000

CMD ["php-fpm"]
