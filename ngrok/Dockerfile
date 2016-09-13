FROM alpine

RUN apk update \
    && apk add openssl
RUN wget https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-amd64.zip \
    && unzip ngrok-stable-linux-amd64.zip
RUN mv ./ngrok /usr/local/bin/

ENTRYPOINT ["ngrok"]
