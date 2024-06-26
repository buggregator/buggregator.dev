#!/bin/bash

psql -v ON_ERROR_STOP=1 --username ${POSTGRES_USER} <<-EOSQL
	CREATE DATABASE examples;
	\c examples;
	GRANT ALL PRIVILEGES ON DATABASE examples TO ${POSTGRES_USER};

	CREATE DATABASE app;
	\c app;
	GRANT ALL PRIVILEGES ON DATABASE app TO ${POSTGRES_USER};

	CREATE DATABASE n8n;
	\c n8n;
	GRANT ALL PRIVILEGES ON DATABASE n8n TO ${POSTGRES_USER};
EOSQL
