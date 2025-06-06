<?php

use App\Http\Controllers\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/availableTime', [BookingController::class, 'getAvailableTimeSlot']);

// Route::get('bookings/new/{location}/select-time', )->name('new.select-time');

