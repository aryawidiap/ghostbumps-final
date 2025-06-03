<?php

use App\Http\Controllers\BookingController;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified',])
    ->name('customer.')
    ->prefix('customer')
    ->group(function () {
        Route::resource('bookings', BookingController::class)
            ->only(['index', 'create', 'store', 'show', 'edit', 'update']);
});

// Route::middleware(['auth', 'verified', 'role:admin'])
//     ->name('admin.')
//     ->prefix('admin')
//     ->group(function () {
//         Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
//         // Route::resource('/roles', RoleController::class);
//         // Route::resource('/permissions', PermissionController::class);
//         Route::resource('/bookings', BookingController::class)
//             ->only(['index', 'update', 'show', 'store']);
//     });
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
