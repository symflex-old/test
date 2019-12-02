FROM php:7.4-fpm

RUN apt-get update && \
    apt-get install -y libpq-dev libzip-dev zlib1g-dev --no-install-recommends git ssh

RUN docker-php-ext-install \
    pdo_pgsql \
    zip

RUN curl -sS https://getcomposer.org/installer | php -- \
        --filename=composer \
        --install-dir=/usr/local/bin && \
        echo "alias composer='composer'" >> /root/.bashrc && \
        composer

WORKDIR /srv/test
ENV COMPOSER_ALLOW_SUPERUSER=1
#COPY build.sh /
#RUN chmod +x /build.sh
#RUN mkdir -p /var/log/php
#RUN chmod 777 /var/log/php
