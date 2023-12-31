
setup-app:
	cp ./.env.example ./.env
	docker compose build
	docker compose up -d
	docker exec php_fidibo /bin/sh -c "composer install && php artisan migrate && php artisan db:seed"

test:
	docker exec php_fidibo /bin/sh -c "php artisan test"