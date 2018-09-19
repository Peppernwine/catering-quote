FROM php:5.6-apache AS build
LABEL stage=build
WORKDIR /usr/local/src/catering-quote
RUN apt-get update && apt-get install -y --no-install-recommends git zip
RUN curl --silent --show-error https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN apt-get install --yes gnupg2
RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -
RUN apt-get install --yes nodejs
RUN npm install npm --global
RUN npm install gulp --global
RUN npm install bower --global --allow-root
COPY . .
RUN npm install
RUN bower install --allow-root
RUN composer install
RUN gulp install-build
RUN gulp build

FROM php:5.6-apache
WORKDIR /var/www/catering-quote
RUN apt-get update && apt-get install -y mysql-client && rm -rf /var/lib/apt
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid
ADD catering-quote.conf /etc/apache2/sites-available/catering-quote.conf
RUN a2ensite catering-quote.conf
RUN a2enmod rewrite
COPY --from=build /usr/local/src/catering-quote/build/catering-quote ./
EXPOSE 80
