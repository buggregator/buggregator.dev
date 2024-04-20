FROM node:21-alpine

ARG APP_VERSION=1.0.0
ENV APP_VERSION=$APP_VERSION

COPY ./spa /app

WORKDIR /app

RUN yarn install
RUN yarn build

EXPOSE 3000

CMD ["yarn dev"]