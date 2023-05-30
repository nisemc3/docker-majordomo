THIS_FILE := $(lastword $(MAKEFILE_LIST))
#envs
cnf ?= config.env
include $(cnf)
export $(shell sed 's/=.*//' $(cnf))

#guid/uid
export UID = $(shell id -u)
export GID = $(shell id -g)

#vars
APP_PATH=./app
DB_DUMP_FILE=./app/db_terminal.sql
.PHONY: help
help:
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.DEFAULT_GOAL := help

run_portainer:
	@docker volume create portainer_data 
	@docker run -d -p 8000:8000 -p 9000:9000 -v /var/run/docker.sock:/var/run/docker.sock -v portainer_data:/data portainer/portainer

init: ## set variables
	@ sed -i 's/MYSQL_ROOT_PASSWORD_conf/${MYSQL_ROOT_PASSWORD}/' docker-compose.yml
	@ sed -i 's/MYSQL_USER_conf/${MYSQL_USER}/' docker-compose.yml
	@ sed -i 's/MYSQL_PASSWORD_conf/${MYSQL_PASSWORD}/' docker-compose.yml
	
init_back: ##set variables back
	@ sed -i 's/${MYSQL_ROOT_PASSWORD}/MYSQL_ROOT_PASSWORD_conf/' docker-compose.yml
	@ sed -i 's/${MYSQL_USER}/MYSQL_USER_conf/' docker-compose.yml
	@ sed -i 's/${MYSQL_PASSWORD}/MYSQL_PASSWORD_conf/' docker-compose.yml
	
build_up: init ## Build docker containers
	@$(call docker_compose, build)
	@$(call docker_compose, up -d)
	@$(call docker_compose, pause majordomo)
	sleep .5
	@$(call docker_compose, exec mysql mysqladmin -u$(MYSQL_USER) -p$(MYSQL_ROOT_PASSWORD) drop $(MYSQL_DATABASE))
	@$(call docker_compose, exec mysql mysqladmin -u$(MYSQL_USER) -p$(MYSQL_ROOT_PASSWORD) create $(MYSQL_DATABASE))
	@ cat ./app/db_terminal.sql | docker-compose exec -T mysql mysql -u$(MYSQL_USER) -p$(MYSQL_PASSWORD) $(MYSQL_DATABASE)	
	@$(call docker_compose, unpause majordomo)

stop: ## Stop docker containers
	@$(call docker_compose, stop)
	
restart: ## Restart docker containers
	@$(call docker_compose, restart)

ps: ## Ps docker containers
	@$(call docker_compose, ps)

exec-mysql: ## Enter to mysql container
	@$(call docker_compose, exec mysql bash)

exec-app: ## Enter to app container
	@$(call docker_compose, exec majordomo bash)

app-owner-user: ## Set file owner to current user for app
	@ docker-compose exec -T majordomo chown www-data:www-data -R /var/www/html && chmod -R 777 /var/www/html
	
init-db:
	@$(call docker_compose, pause majordomo)
	sleep .5
	@$(call docker_compose, exec mysql mysqladmin -u$(MYSQL_USER) -p$(MYSQL_ROOT_PASSWORD) drop $(MYSQL_DATABASE))
	@$(call docker_compose, exec mysql mysqladmin -u$(MYSQL_USER) -p$(MYSQL_ROOT_PASSWORD) create $(MYSQL_DATABASE))
	@ cat ./app/db_terminal.sql | docker-compose exec -T mysql mysql -u$(MYSQL_USER) -p$(MYSQL_PASSWORD) $(MYSQL_DATABASE)	
	@$(call docker_compose, unpause majordomo)

%:
    @:
define docker_compose
    @docker-compose -f ./docker-compose.yml $(1)
endef
