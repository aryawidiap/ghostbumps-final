<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Location;
use App\Rules\ValidLocation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        // Admin and employee can see all bookings
        if ($user->hasRole('admin')) {
            $user = Auth::user();
            return Inertia::render('admin/bookings/Index', [
                'bookings' => $user->bookings()->latest()->get(),
                'recentBookings' => $user->bookings()->latest()->get(),
                'refundBookings' => $user->bookings()->latest()->get(),
            ]);
        }
        // Customer can see their own bookings only
        if ($user->hasRole('customer')) {
            $user = Auth::user();
            return Inertia::render('bookings/Index', [
                'bookings' => DB::table('bookings')
                    ->select('bookings.id as id', 'name as location_name', 'booking_date', 'booking_hour', 'number_of_persons', 'status', 'description as location_description', 'photo_path')
                    ->join('locations', 'locations.id', '=', 'bookings.location_id')
                    ->where('user_id', $user->id)
                    ->latest('bookings.created_at')
                    ->get(),
                'user' => $user->bookings()->latest()->get(),
                'logbook' => $user->bookings()->latest()->get(),
                'nextExperiences' => $user->bookings()->latest()->get(),
                'visitedLocation' => $user->bookings()->latest()->get(),
                'unvisitedLocation' => $user->bookings()->latest()->get(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Admin can create bookings on customer behalf
        if ($request->user()->hasRole('admin')) {
            return Inertia::render('bookings/new/SelectLocation', [
                'locations' => Location::all()
            ]);
        }
        // Customer can create their own bookings only
        if ($request->user()->hasRole('customer')) {
            return Inertia::render('bookings/new/SelectLocation', [
                'locations' => Location::all()
            ]);
        }
    }
    public function createSelectTime(Location $location)
    {
        // Customer can see their own bookings only
        $user = Auth::user();

        if ($user->hasRole('customer')) {
            return Inertia::render('bookings/new/SelectDate', [
                'location' => $location
            ]);
        }
    }

    public function getAvailableTimeSlot(Request $request)
    {
        $allTimeSlot = [];

        for ($i = 10; $i <= 20; $i++) {
            if ($i == 13) {
                array_push($allTimeSlot, [
                    "time" => $i,
                    "isAvailable" => false,
                ]);
                continue;
            }

            array_push($allTimeSlot, [
                "time" => $i,
                "isAvailable" => true,
            ]);
        }

        $date = $request->input('date');


        $availableTimeSlot = [...$allTimeSlot, $date];

        return $allTimeSlot;
    }

    public function createNumberOfPerson(Location $location)
    {
        // Customer can see their own bookings only
        $user = Auth::user();

        if ($user->hasRole('customer')) {
            return Inertia::render('bookings/new/NumberOfPerson', [
                'locations' => Location::all()
            ]);
        }
    }

    public function createConfirmDetails(Request $request)
    {
        // Customer can see their own bookings only
        $user = Auth::user();

        if ($user->hasRole('customer')) {
            return Inertia::render('bookings/new/ConfirmDetails', [
                // 'locations' => Location::all()
                'user' => $user
            ]);
        }
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user();

        if ($user->hasRole('customer')) {
            $validated = $request->validate([
                'location_id' => ['required', 'int', new ValidLocation],
                'date' => ['required', 'date',],
                'time' => ['required', 'int', 'min:10', 'max:20'],
                'number_of_persons' => ['required', 'int', 'max:10', 'min:1'],
            ]);

            // var_dump($validated);
            $bookingDate = Carbon::parse($validated['date'])->format('Y-m-d H:i:s');
            $bookingTicket = $user->bookings()->create(
                [
                    'location_id' => $validated['location_id'],
                    'booking_date' => $bookingDate,
                    'booking_hour' => $validated['time'],
                    'number_of_persons' => $validated['number_of_persons'],
                    'status' => 'confirmed',
                ]
            );

            return redirect(route('customer.bookings.new.confirmed', $bookingTicket));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function confirmed(Booking $confirmedBooking)
    {
        //
        $user = Auth::user();

        if ($user->hasRole('customer')) {
            return Inertia::render('bookings/new/Confirmed', [
                'confirmedTicket' => $confirmedBooking,
                'customerName' => $user->name
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        $user = Auth::user();

        if ($user->hasRole('customer')) {
            return Inertia::render('bookings/Show', [
                'booking' =>  DB::table('bookings')
                    ->select('bookings.id as id', 'name as location_name', 'booking_date', 'booking_hour', 'number_of_persons', 'status', 'description as location_description', 'photo_path')
                    ->join('locations', 'locations.id', '=', 'bookings.location_id')
                    ->where('bookings.id', $booking->id)
                    // ->where('user_id', $user->id)
                    ->latest('bookings.created_at')
                    ->first(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        // Admin can edit all booking
        // Employee can only edit their booking
        // User can only edit their booking
    }

    /**
     * Display the specified resource.
     */
    public function cancel(Booking $booking)
    {
        $user = Auth::user();

        if ($user->hasRole('customer')) {
            return Inertia::render('bookings/refund/RefundTicket', [
                'booking' =>  DB::table('bookings')
                    ->select('bookings.id as id', 'name as location_name', 'booking_date', 'booking_hour', 'number_of_persons', 'status', 'description as location_description', 'photo_path')
                    ->join('locations', 'locations.id', '=', 'bookings.location_id')
                    ->where('bookings.id', $booking->id)
                    // ->where('user_id', $user->id)
                    ->latest('bookings.created_at')
                    ->first(),
            ]);
        }
    }

    /**
     * Ask for reason of cancellation
     */
    public function cancelProcess(Booking $booking, Request $request)
    {
        $user = Auth::user();

        if ($user->hasRole('customer')) {
            return Inertia::render('bookings/refund/CancellationReason', [
                'booking' =>  $booking
            ]);
        }
    }

    /**
     * Commit cancellation
     */
    public function cancelCommit(Booking $booking, Request $request)
    {
        $user = Auth::user();

        if ($user->hasRole('customer')) {
            $cancelledBooking = Booking::find($booking->id);
            $cancelledBooking->status = 'cancelled';
            $cancelledBooking->save();
            return Inertia::render('bookings/refund/ConfirmedCancellation', [
                'booking' =>  DB::table('bookings')
                    ->select('bookings.id as id', 'name as location_name', 'booking_date', 'booking_hour', 'number_of_persons', 'status', 'description as location_description', 'photo_path')
                    ->join('locations', 'locations.id', '=', 'bookings.location_id')
                    ->where('bookings.id', $booking->id)
                    // ->where('user_id', $user->id)
                    ->latest('bookings.created_at')
                    ->first(),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }

    /**
     * Refund process controllers
     */
    public function refundRequestIndex(Request $request)
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return Inertia::render('admin/bookings/refund/RefundRequest', []);
        }
    }

    public function test(Request $request)
    {
        $user = Auth::user();

        return Inertia::render('admin/bookings/Index'); // Insert page
    }
}
