FROM php:8.2-apache
RUN apt-get update -y
RUN apt-get install zip unzip git -y
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite
#Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=. --filename=composer
RUN mv composer /usr/local/bin/
COPY . /var/www/html/
WORKDIR /var/www/html/
RUN composer install
RUN vendor/bin/phinx rollback -e development -t 0
RUN vendor/bin/phinx migrate -e development
RUN vendor/bin/phinx seed:run -e development
RUN chmod -R 777 db
EXPOSE 80