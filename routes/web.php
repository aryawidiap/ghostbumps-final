<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\LocationController;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('locations', [LocationController::class, 'index'])->name('locations');

Route::get('dashboard', function () {
    $user = Auth::user();
    if ($user->hasRole('admin')) {
        return Inertia::render('admin/Dashboard');
    } else if ($user->hasRole('admin')) {
        return Inertia::render('Dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:customer']) // TODO: add role middleware
    ->name('customer.')
    ->prefix('customer')
    ->group(function () {
        Route::resource('bookings', BookingController::class)
            ->only(['store', 'show', 'edit', 'update']);
        Route::get('bookings/', [BookingController::class, 'index'])->name('bookings.index');
        Route::get('bookings/new/select-location', [BookingController::class, 'create'])->name('new.select-location');
        Route::get('bookings/new/{location}/select-time', [BookingController::class, 'createSelectTime'])->name('new.select-time');
        Route::get('bookings/new/number-of-person', [BookingController::class, 'createNumberOfPerson'])->name('new.number-of-person');
        Route::get('bookings/new/confirm-details', [BookingController::class, 'createConfirmDetails'])->name('new.confirm-details');
        Route::post('bookings/new/store', [BookingController::class, 'store'])->name('new.booking.store');
        Route::get('locations', [LocationController::class, 'index'])->name('locations');
});

Route::middleware(['auth', 'verified', 'role:admin']) // TODO: add role middleware
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::resource('bookings', BookingController::class)
            ->only(['index', 'store', 'create', 'show', 'edit', 'update']);

        Route::get('locations', [LocationController::class, 'index'])->name('locations');

        Route::resource('locations', LocationController::class)
            ->only(['index', 'store', 'show', 'create', 'edit', 'update']);
        
        Route::name('bookings.')
        ->prefix('bookings')
        ->group(function () {
            Route::get('new', [BookingController::class, 'create'])->name('new');
            Route::get('refund-requests', [BookingController::class, 'refundRequestsIndex'])->name('refund-requests.index');
        });
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
    // });
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
