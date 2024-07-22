.DEFAULT_GOAL := help

# Variables
DOCKER_COMPOSE := docker-compose
ENV_FILE := .env
COMPOSE_FILE := docker-compose.yml

# Build and start containers
build: ## Build containers
	@echo "Building containers..."
	$(DOCKER_COMPOSE) --file $(COMPOSE_FILE) build

start: ## Start containers
	@echo "Starting containers..."
	$(DOCKER_COMPOSE) --file $(COMPOSE_FILE) up -d

stop: ## Stop containers
	@echo "Stopping containers..."
	$(DOCKER_COMPOSE) --file $(COMPOSE_FILE) down --remove-orphans

restart: ## Restart containers
	@$(MAKE) stop
	@$(MAKE) start

ps: ## List running containers
	@$(DOCKER_COMPOSE) --file $(COMPOSE_FILE) ps

shell: ## Open a shell in the server container
	@$(DOCKER_COMPOSE) --file $(COMPOSE_FILE) exec server bash

test: ## Run tests inside the Laravel container
	@echo "Running tests..."
	@$(DOCKER_COMPOSE) --file $(COMPOSE_FILE) exec -T laravel.test sh -c "php artisan test ${TEST_OPTION}"

grant-permissions: ## Grant MySQL permissions
	@docker exec -i -e MYSQL_USER='root' -e MYSQL_PASSWORD='password' laravel sh -c "$(cat ${CURDIR}/grant_permissions.sh)"
