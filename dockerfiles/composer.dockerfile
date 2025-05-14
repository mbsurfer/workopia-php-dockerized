FROM composer:latest

RUN addgroup -g 1000 appuser && adduser -G appuser -g appuser -s /bin/sh -D appuser

USER appuser

WORKDIR /var/www/html

ENTRYPOINT [ "composer", "--ignore-platform-reqs" ]