<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\LocationController;
use App\Models\Booking;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'topLocations' => Location::all()->take(3)
    ]);
})->name('home');

Route::get('locations', [LocationController::class, 'index'])->name('locations');
Route::get('test', [BookingController::class, 'test'])->name('test');

Route::get('dashboard', function () {
    $user = Auth::user();

    if ($user->hasRole('admin')) {
        $date = Date('Y-m-d');
        $hour = Date('H');

        return Inertia::render('admin/Dashboard', [
            'user' => $user,
            'nextBooking' => DB::table('bookings')
                    ->select('bookings.id as id', 'locations.name as location_name', 'booking_date', 'booking_hour', 'number_of_persons', 'status', 'description as location_description', 'photo_path', 'users.name as customer_name')
                    ->join('locations', 'locations.id', '=', 'bookings.location_id')
                    ->join('users', 'users.id', '=', 'bookings.user_id')
                    ->where('status', 'confirmed')
                    ->whereRaw("CONCAT(booking_date, ' ', LPAD(booking_hour, 2, '0'), ':00:00') > ?", [$date . " " . str_pad($hour, 2, "0", STR_PAD_LEFT) . ":00:00"])
                    ->orderBy('bookings.created_at')
                    ->first(),
        ]);
    }

    if ($user->hasRole('customer')) {
        $date = Date('Y-m-d');
        $hour = Date('H');
        return Inertia::render('Dashboard', [
            'user' => $user,
            'logbook' => DB::table('bookings')
                ->select('bookings.id as id', 'name as location_name', 'booking_date', 'booking_hour', 'number_of_persons', 'status', 'description as location_description', 'photo_path')
                ->join('locations', 'locations.id', '=', 'bookings.location_id')
                ->where('user_id', $user->id)
                ->latest('bookings.created_at')
                ->limit(3)
                ->get(),
            'nextExperience' => DB::table('bookings')
                ->select('bookings.id as id', 'name as location_name', 'booking_date', 'booking_hour', 'number_of_persons', 'status', 'description as location_description', 'photo_path')
                ->join('locations', 'locations.id', '=', 'bookings.location_id')
                ->where('user_id', $user->id)
                ->where('status', 'confirmed')
                ->whereRaw("CONCAT(booking_date, ' ', LPAD(booking_hour, 2, '0'), ':00:00') > ?", [$date . " " . str_pad($hour, 2, "0", STR_PAD_LEFT) . ":00:00"])
                // ->where('bookings.booking_date', '>', gmdate("Y-m-d"))
                ->orderBy('bookings.created_at', 'asc')
                ->limit(1)
                ->first(),
            'visitedLocations' => DB::table('locations')
                ->select('locations.id as id', 'name', 'booking_date', 'status', 'short_description as description', 'photo_path')
                ->join('bookings', 'locations.id', '=', 'bookings.location_id')
                ->where('user_id', $user->id)
                ->where('status', 'completed')
                ->latest('bookings.created_at')
                ->get(),
            'unvisitedLocations' => DB::table('locations')
                ->select('locations.id as id', 'name', 'short_description as description', 'photo_path')
                ->latest('locations.created_at')
                ->get(),
        ]);
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
        Route::get('bookings/new/confirmed/{confirmedBooking}', [BookingController::class, 'confirmed'])->name('bookings.new.confirmed');
        Route::get('bookings/{booking}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
        Route::get('bookings/{booking}/cancel/process', [BookingController::class, 'cancelProcess'])->name('bookings.cancel.reason');
        Route::post('bookings/{booking}/cancel', [BookingController::class, 'cancelCommit'])->name('bookings.cancel');
        Route::get('locations', [LocationController::class, 'index'])->name('locations');
    });

Route::middleware(['auth', 'verified', 'role:admin']) // TODO: add role middleware
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::resource('bookings', BookingController::class)
            ->only(['index', 'store', 'create', 'show', 'edit', 'update']);


        Route::resource('locations', LocationController::class)
            ->only(['index', 'store', 'show', 'create', 'edit', 'update']);

        Route::get('locations/create/{location}/success', [LocationController::class, 'success'])->name('locations.create.success');
        Route::name('bookings.')
            ->prefix('bookings')
            ->group(function () {
                Route::get('new', [BookingController::class, 'create'])->name('new');
                Route::get('refund-requests', [BookingController::class, 'refundRequestsIndex'])->name('refund-requests.index');
                Route::get('refund/{booking}', [BookingController::class, 'refund'])->name('refund');
                Route::post('refund/{booking}', [BookingController::class, 'refundStore'])->name('refundStore');
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
require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
