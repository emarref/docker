FROM php:7.3-fpm

ENV HOSTNAME=localhost
ENV DOCUMENT_ROOT=/var/www/public

COPY --from=abiosoft/caddy:no-stats /usr/bin/caddy /usr/bin/caddy

COPY ./caddy/ /etc/caddy/

RUN rm -rf /var/www
COPY ./public/ /var/www/public/

WORKDIR /var/www

CMD ["/usr/bin/caddy", "-conf", "/etc/caddy/Caddyfile", "-agree"]
