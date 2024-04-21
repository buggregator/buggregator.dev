# Clone the project
FROM alpine/git as git

ARG REPOSITORY=https://github.com/buggregator/buggregator.dev
RUN git clone $REPOSITORY /app

FROM node:21-alpine

ARG APP_VERSION=1.0.0
ENV APP_VERSION=$APP_VERSION

COPY --from=git /app/spa /app

WORKDIR /app

RUN yarn install
RUN yarn build

EXPOSE 3000

CMD ["node", ".output/server/index.mjs"]