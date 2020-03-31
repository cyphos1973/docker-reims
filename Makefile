include .env
COLOR_RESET       = \033[0m
COLOR_ERROR       = \033[31m
COLOR_INFO        = \033[32m
COLOR_COMMENT     = \033[33m
COLOR_TITLE_BLOCK = \033[0;44m\033[37m
PROJECT			  = "Docker-reims"
DOCKER_COMPOSE	  = docker-compose
DOCKER_APP        = docker-compose exec php

help:
	@printf "${COLOR_TITLE_BLOCK}${PROJECT} Makefile${COLOR_RESET}\n"
	@printf "\n"
	@printf "${COLOR_COMMENT}Usage:${COLOR_RESET}\n"
	@printf " make [target]\n\n"
	@printf "${COLOR_COMMENT}Available targets:${COLOR_RESET}\n"
	@awk '/^[a-zA-Z\-\_0-9\@]+:/ { \
		helpLine = match(lastLine, /^## (.*)/); \
		helpCommand = substr($$1, 0, index($$1, ":")); \
		helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
		printf " ${COLOR_INFO}%-16s${COLOR_RESET} %s\n", helpCommand, helpMessage; \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST)

build:
	$(DOCKER_COMPOSE) build

pull:
	$(DOCKER_COMPOSE) pull

start:
	$(DOCKER_COMPOSE) up -d --remove-orphans

exec:
	docker exec -it $(CONTAINER_NAME)_php bash
stop:
	$(DOCKER_COMPOSE) stop

stop-all:
	 docker stop $$(docker ps -a -q)

stop-remove-all:
	docker stop $$(docker ps -a -q)
	docker rm $$(docker ps -a -q)
	docker rmi $$(docker images -a -q) -f
	docker network rm $$(docker images -a -q)

down:
	$(DOCKER_COMPOSE) down

prune:
	docker system prune

install:
	$(DOCKER_COMPOSE) build --build-arg PHP_VERSION=$(PHP_VERSION)
	$(DOCKER_COMPOSE) pull
	$(DOCKER_COMPOSE) up -d
	docker exec -it $(CONTAINER_NAME)_php bash

vendor:
	$(DOCKER_APP) composer install

node_modules:
	$(DOCKER_APP) yarn install

db-test: .env
	$(DOCKER_APP) bin/console doctrine:database:drop --if-exists --force
	$(DOCKER_APP) bin/console doctrine:database:create --if-not-exists
	$(DOCKER_APP) bin/console doctrine:schema:drop --force --no-interaction
	$(DOCKER_APP) bin/console doctrine:schema:create --no-interaction
	$(DOCKER_APP) bin/console doctrine:fixtures:load --no-interaction --purge-with-truncate -vvv

phpcs:
	$(DOCKER_APP) php vendor/bin/php-cs-fixer fix src/