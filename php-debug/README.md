Self-contained PHP web server.

- Based on official PHP images (7.3).
- Uses Caddy to serve from a single container.
- Self-signed SSL by default.
- XDebug installed

I.e. you don't need separate web and app containers.

```
docker run --rm -it -p 8080:2015 emarref/php
```

Visit https://localhost:8080/ to see phpinfo() output.

### Document Root

Mount your own project in the default document root of `/var/www/public`. E.g. for a Symfony project:

```
docker run --rm -it -p 8080:2015 -v $PWD:/var/www emarref/php
```

Or specify some other document root if you would like to.

```
docker run --rm -it -p 8080:2015 -e DOCUMENT_ROOT=/some/other/path emarref/php
```

### Host Name

Specify a hostname other than localhost if you would like to.

```
docker run --rm -it -p 8080:2015 -e HTTP_HOST=some.other.host emarref/php
```

### PHP Extensions

By default, this image has no customisations to PHP.

If you need to install extensions, build your own image based on this one.

```
FROM emarref/php

RUN docker-php-ext-install pdo pdo_pgsql
```

### Caddy Configuration

The Caddyfile is located at `/etc/caddy/Caddyfile`. Either build a custom image that replaces this file with your own,
or mount a file from your host to the container at this location.

```
docker run --rm -it -p 8080:2015 -v $PWD/Caddyfile:/etc/caddy/Caddyfile emarref/php
```