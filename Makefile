
setup-app:
	cp ./.env.example ./.env
	docker compose build
	docker compose up -d
	docker exec php_fidibo /bin/sh -c "composer install && chmod -R 777 storage && php artisan key:generate && php artisan storage:link && php artisan migrate && php artisan passport:install && php artisan db:seed"

test:
	docker exec php_fidibo /bin/sh -c "php artisan test"