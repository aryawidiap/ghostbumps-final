# Ghostbumps: A Website for Booking Ticket for Ghost Houses

## TODO

[v] Install spatie-permission
[V] php artisan make:model Booking -mrc
[V] php artisan make:model Location -mrc
[v] Create migration properly
[ ] Create different header for admin and customer resources\js\components\AppHeader.vue
[ ] Create booking func
    [ ] Seed booking !IMPORTANT
    [ ] List all booking
    [ ] View booking func
    [ ] Create cancel booking func
[ ] Confirm booking from the admin
    [ ] List all booking for today
    [ ] Refund the money

## Start the app

### Generate autoload, env, database

```cmd
composer update
cp .env.example .env
php artisan key:generate
```

Need to run if any modification to database

```cmd
php artisan migrate:fresh --seed
```

If using nvm:

```cmd
nvm use 24.1.0
```

### Run the server and the app

```cmd
npm install
npm run build
composer run dev
php -d variables_order=GPCS artisan serve --port=8000
```

If error `cannot run script in this machine`

```cmd
Set-ExecutionPolicy RemoteSigned –Scope Process
```
