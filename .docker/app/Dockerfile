ARG ROAD_RUNNER_IMAGE=2023.3.7
ARG CENTRIFUGO_IMAGE=v4

# Build rr binary
FROM ghcr.io/roadrunner-server/roadrunner:$ROAD_RUNNER_IMAGE as rr

# Configure PHP project
FROM ghcr.io/buggregator/docker:latest as backend

COPY ./app /app
COPY --from=rr /usr/bin/rr /app

ARG APP_VERSION=v1.0
ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /app

RUN composer config --no-plugins allow-plugins.spiral/composer-publish-plugin false
RUN composer install --no-dev

WORKDIR /app
RUN php app.php configure

EXPOSE 8000/tcp

CMD ./rr serve -c .rr-prod.yaml
