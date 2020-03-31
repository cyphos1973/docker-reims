drop:
	php bin/console doctrine:database:drop --force
	php bin/console doctrine:database:create

fix-load-small:
	php bin/console doctrine:database:drop --force
	php bin/console doctrine:database:create
	php bin/console doctrine:migrations:migrate --no-interaction
	php bin/console doctrine:fixtures:load --append

fix-load-all:
	chown -R www-data:1000 src/Migrations
	rm -f src/Migrations/*
	php bin/console doctrine:database:drop --force
	php bin/console doctrine:database:create
	php bin/console make:migration
	php bin/console doctrine:migrations:migrate --no-interaction
	php bin/console doctrine:fixtures:load --append
