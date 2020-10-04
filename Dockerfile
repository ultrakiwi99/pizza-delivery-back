FROM php:fpm-alpine
RUN apk --update --no-cache add git
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR /var/www
COPY composer.json .
CMD composer update ; php-fpm 
EXPOSE 9000