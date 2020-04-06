install:
	composer install
	sudo apt install php-gmp
lint:
	composer run-script phpcs -- --standard=PSR12 src bin
