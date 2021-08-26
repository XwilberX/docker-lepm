FROM php:7.0-fpm  
RUN docker-php-ext-install 
# checar esto de los permisos, puede ser con chmod 777
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www/html