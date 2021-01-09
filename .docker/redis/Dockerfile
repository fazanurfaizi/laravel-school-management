FROM redis:latest

LABEL maintainer="Faza Nurfaizi <nurfaizi.faza@gmail.com>"

RUN mkdir -p /usr/local/etc/redis
COPY redis.conf /usr/local/etc/redis/redis.conf

VOLUME /data

ARG REDIS_PORT=${REDIS_PORT}
ENV REDIS_PORT=${REDIS_PORT}

EXPOSE ${REDIS_PORT}

CMD [ "redis-server", "/usr/local/etc/redis/redis.conf" ]
