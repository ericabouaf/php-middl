tests:
	./vendor/bin/phpunit

coverage:
	php -d pcov.enabled=1  ./vendor/bin/phpunit --coverage-html=code-coverage
	open code-coverage/index.html

phpstan:
	./vendor/bin/phpstan

.PHONY: tests
