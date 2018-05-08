FROM php:7.2-cli

RUN mkdir -p app
WORKDIR /app
COPY . /app

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get update
RUN apt-get install -y git

RUN composer install --no-interaction

EXPOSE 80

ENTRYPOINT ["php", "-S", "0.0.0.0:80"]
