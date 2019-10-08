NAME=ITMS
VERSION=0.2

build:
	docker-compose build --no-cache

start:
	docker-compose up -d
	docker ps -a

rebuild:
	docker-compose build
	docker-compose down
	docker-compose up -d
	docker ps -a

restart:
	docker-compose restart
	docker ps -a

clean:
	docker-compose down

down:
	docker-compose down

stop:
	docker-compose stop

exec:
	docker exec -it /bin/bash
