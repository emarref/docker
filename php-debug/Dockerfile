FROM emarref/php as xdebug

ARG XDEBUG_VERSION=xdebug-2.7.2
ARG XDEBUG_MODULE_LOCATION=/usr/local/lib/php/extensions/no-debug-non-zts-20180731

WORKDIR /tmp/xdebug
RUN curl -so $XDEBUG_VERSION.tgz https://xdebug.org/files/$XDEBUG_VERSION.tgz \
    && tar xzf $XDEBUG_VERSION.tgz

# Build xdebug
WORKDIR /tmp/xdebug/$XDEBUG_VERSION
RUN phpize \
    && ./configure \
    && make

FROM emarref/php

COPY --from=xdebug /tmp/xdebug/xdebug-2.7.2/modules/xdebug.so /usr/local/lib/php/extensions/no-debug-non-zts-20180731
COPY config/ /usr/local/etc/php/
RUN docker-php-ext-enable xdebug
