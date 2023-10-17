dc_exec=docker exec -it core-ui

start:
	docker-compose up -d --remove-orphans

stop:
	docker-compose down

bash:
	 $(dc_exec) bash

composer:
	$(dc_exec) composer install

install: start composer

dump:
	 docker exec -it coreui-db mysqldump -u root -proot core-ui > dump.sql