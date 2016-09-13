FROM alpine

RUN apk update \
    && apk add openssl ca-certificates
RUN wget https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-amd64.zip \
    && unzip ngrok-stable-linux-amd64.zip
RUN mv ./ngrok /usr/local/bin/ \
    && rm ngrok-stable-linux-amd64.zip

ENV TERM=xterm

EXPOSE 4040

ENTRYPOINT ["ngrok"]
