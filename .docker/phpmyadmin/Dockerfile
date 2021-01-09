FROM phpmyadmin/phpmyadmin

LABEL maintainer="Faza Nurfaizi <nurfaizi.faza@gmail.com>"

VOLUME /sessions

RUN echo '' >> /usr/local/etc/php/conf.d/php-phpmyadmin.ini \
    && echo '[PHP]' >> /usr/local/etc/php/conf.d/php-phpmyadmin.ini \
    && echo 'post_max_size = 2G' >> /usr/local/etc/php/conf.d/php-phpmyadmin.ini \
    && echo 'upload_max_filesize = 2G' >> /usr/local/etc/php/conf.d/php-phpmyadmin.ini \
    && echo "$cfg['Servers'][$i]['auth_type'] = 'cookies';" >> /usr/local/etc/php/conf.d/php-phpmyadmin.ini

EXPOSE 8080 8080
