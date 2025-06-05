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

## Routes

- Customer
    - Bookings
        [ ] Make a new booking
        [ ] Cancel a future booking
        [ ] Edit a future booking
    - Dashboard
        [ ] Show future booking
        [ ] Show booking history, sort by date
        [ ] Show location in past booking
        [ ] Show location NOT in past booking
- Admin
    - Bookings
        [ ] Make booking on behalf of customer
        [ ] Cancel a booking of a customer
        [ ] Edit a future booking
        [ ] Accept a refund request
    - Dashboard
        [ ] Show future booking, closest to time now (Status: uncompleted, oldest, time > now)
        [ ] Show cancellation request
        [ ] Show today's stats: number of booking today, compare to yesterday
        [ ] Show weekly and monthly stats too.
        <!-- https://github.com/nathanreyes/v-calendar/issues/632 -->
    - Statistics
        [ ] ??

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
