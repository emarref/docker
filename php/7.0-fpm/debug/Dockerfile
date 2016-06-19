FROM emarref/php:7.0-fpm

COPY pool-debug.conf /usr/local/etc/php-fpm.d/

RUN mkdir -p /tmp/xdebug \
    && cd /tmp/xdebug \
    && curl -so xdebug-2.4.0.tgz https://xdebug.org/files/xdebug-2.4.0.tgz \
    && tar xvzf xdebug-2.4.0.tgz \
    && cd xdebug-2.4.0 \
    && phpize \
    && ./configure \
    && make \
    && cp modules/xdebug.so /usr/local/lib/php/extensions/no-debug-non-zts-20151012

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
