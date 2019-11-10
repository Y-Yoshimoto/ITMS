NAME=ITMS
VERSION=0.2

build:
	docker-compose build

start:
	docker-compose up -d
	docker ps -a

rebuild:
	docker-compose build --no-cache
	docker-compose down
	docker-compose up -d --build
	docker ps -a

restart:
	docker-compose build
	docker-compose up -d --build
	docker ps -a

down:
	docker-compose down

stop:
	docker-compose stop

exec:
	docker exec -it /bin/bash
