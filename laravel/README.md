Pedro Sperotto - Lecrepus17
Alexandre - sidmaroli

instruções
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
e mover as duas imagens da storage para a public dentro
