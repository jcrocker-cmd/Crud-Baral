# install build-essential if you cannot run make commands
# example use: 
# make up
cd:
	cd '/mnt/c/xampp/htdocs/CRUD-baral/' & pwd'

env:
	cp .env.example .env
	
up:
	./vendor/bin/sail up -d

rebuild:
	./vendor/bin/sail up --build -d
	
recache:
	./vendor/bin/sail artisan config:cache

restart:
	./vendor/bin/sail restart

stop:
	./vendor/bin/sail stop

migrate:
	./vendor/bin/sail php artisan migrate
	
down:
	./vendor/bin/sail down

keygen:
	./vendor/bin/sail php artisan key:generate
init:
	make env
	make up
	make migrate
	make keygen
