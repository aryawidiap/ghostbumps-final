# Ghostbumps: A Website for Booking Ticket for Ghost Houses

## TODO

[ ] Install spatie-permission
[V] php artisan make:model Booking -mrc
[V] php artisan make:model Location -mrc
[ ] Create migration properly

## Start the app

```cmd
composer update
npm install
npm run build
composer run dev
php -d variables_order=GPCS artisan serve --port=8000

```

```
cp .env.example .env
php artisan key:generate
```
