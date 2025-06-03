# Ghostbumps: A Website for Booking Ticket for Ghost Houses

## TODO

[v] Install spatie-permission
[V] php artisan make:model Booking -mrc
[V] php artisan make:model Location -mrc
[v] Create migration properly
[ ] Create different header for admin and customer resources\js\components\AppHeader.vue
[ ] Create booking func
[ ] Create cancel booking func
[ ] View booking func

## Start the app

```cmd
composer update
cp .env.example .env
php artisan key:generate
```

```cmd
nvm use 24.1.0
```

Need to run if any modification to database
```cmd
php artisan migrate:fresh --seed
```

```cmd
Set-ExecutionPolicy RemoteSigned –Scope Process
```

```cmd
npm install
npm run build
composer run dev
php -d variables_order=GPCS artisan serve --port=8000
```

```cmd
cp .env.example .env
php artisan key:generate
```
