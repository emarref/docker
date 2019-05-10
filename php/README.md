Self-contained PHP web server. I.e. you don't need separate http and fpm containers.

- Based on official PHP images (7.3).
- Uses Caddy (abiosoft/caddy) for http/s.
- Self-signed SSL by default.

```
docker run --rm -it -p 443:2015 emarref/php
```

Visit https://localhost/ to see phpinfo() output.

## Configuration

### Caddyfile

The Caddyfile is located at `/etc/caddy/Caddyfile`. Either build a custom image that replaces this file with your own,
or mount a file from your host to the container at this location.

```
docker run --rm -it -p 8080:2015 -v $PWD/Caddyfile:/etc/caddy/Caddyfile emarref/php
```

The Caddyfile is split into imports which can be selectively mounted if you want to override a part of the configuration.

```
/etc/caddy/
├── Caddyfile
├── common.conf
├── log.conf
├── php.conf
└── tls.conf
```

Additional configuration files can be added to `/etc/caddy/conf.d`, where all .conf files will be imported.

### PHP Extensions

By default, this image has no customisations to PHP.

If you need to install extensions, build your own image based on this one.

```
FROM emarref/php

RUN docker-php-ext-install pdo pdo_pgsql
```

## Environment

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
docker run --rm -it -p 8080:2015 -e HOSTNAME=some.other.host emarref/php
```
