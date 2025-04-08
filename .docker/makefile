docker up:
	docker compose -p todo_php up -d --build --force-recreate

docker down:
	docker compose -p todo_php down

phpstan:
	docker exec todo_php vendor/bin/phpstan analyse app

test:
	docker exec todo_php vendor/bin/codecept run --steps

composer-install:
	docker exec todo_php composer install

composer-update:
	docker exec todo_php composer update