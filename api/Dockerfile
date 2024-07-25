FROM php:8.1.0-fpm

WORKDIR /app

RUN apt-get update

RUN apt-get -y install git zip libpq-dev libxml2-dev

RUN docker-php-ext-install dom pdo pdo_pgsql pgsql

RUN curl -sL https://getcomposer.org/installer | php -- --install-dir /usr/bin --filename composer

RUN composer require doctrine/doctrine-bundle

RUN composer require doctrine/doctrine-migrations-bundle

RUN pecl install xdebug

CMD ["php-fpm"]