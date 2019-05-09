FROM debian as caddy

ARG CADDY_VERSION=v1.0.0

WORKDIR /root/caddy

RUN apt-get update \
    && apt-get install -y curl \
    && rm -rf /var/lib/apt/lists/*

RUN curl -Lso caddy_${CADDY_VERSION}_linux_amd64.tar.gz https://github.com/mholt/caddy/releases/download/${CADDY_VERSION}/caddy_${CADDY_VERSION}_linux_amd64.tar.gz \
    && tar xzf caddy_${CADDY_VERSION}_linux_amd64.tar.gz

FROM php:7.3-fpm

ENV HTTP_HOST=localhost
ENV DOCUMENT_ROOT=/var/www/public

COPY --from=caddy /root/caddy/caddy /usr/local/bin/caddy

COPY Caddyfile /etc/caddy/

RUN rm -rf /var/www
COPY index.php /var/www/public/
COPY favicon.ico /var/www/public/

WORKDIR /var/www

CMD ["/usr/local/bin/caddy", "-conf", "/etc/caddy/Caddyfile"]
