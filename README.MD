git clone https://github.com/Skyoddler/lara_test.git

cp src/.env.example src/.env
(fill src/.env from .env)

docker compose up --build

docker exec -it app sh

composer install

php artisan key:generate

php artisan migrate