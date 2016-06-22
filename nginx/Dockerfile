FROM nginx:1.11

RUN rm /etc/nginx/conf.d/* \
    && mkdir /etc/nginx/cert

COPY nginx.conf /etc/nginx/
COPY default.conf /etc/nginx/conf.d/
COPY server.crt /etc/nginx/cert/
COPY server.key /etc/nginx/cert/

WORKDIR /var/www
