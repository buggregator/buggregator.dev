build:
	for volume in db n8n; do \
	    [ -d "../.docker-data/"$$volume ] || mkdir -p "../.docker-data/"$$volume; \
	    chmod 777 "../.docker-data/"$$volume; \
    done

	docker compose up --no-start;

start:
	docker compose up --remove-orphans -d;

up: build start

stop:
	docker compose stop;

down:
	docker compose down;

restart:
	docker compose restart;

list:
	docker compose ps;

log-tail:
	docker compose logs --tail=50 -f;

pull-latest:
	docker compose pull;

# =========================

bash-api:
	docker compose exec buggregator-api /bin/sh;

reset-api:
	docker compose exec buggregator-api ./rr reset;

reset: reset-api
