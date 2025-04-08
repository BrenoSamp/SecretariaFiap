
#!make
include .env
export $(shell sed 's/=.*//' .env)

t=

up:
	docker-compose up
downs:
	docker-compose down -v --remove-orphans
sh:
	docker exec -it -u nginx secretaria-fiap-php /bin/bash
db:
	docker exec -it secretaria-fiap-db bash -c "mysql -u root -proot -D secretaria_fiap"
install:
	composer install
dump:
	composer dump-autoload
reset:
	docker-compose down -v --remove-orphans && docker system prune -a -f && docker-compose up --build
migrate:
	vendor/bin/phinx migrate
rollback:
	vendor/bin/phinx rollback -e development