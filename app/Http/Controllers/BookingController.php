<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Location;
use App\Rules\ValidLocation;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
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
                'bookings' => DB::table('bookings')
                    ->select('bookings.id as id', 'locations.name as location_name', 'booking_date', 'booking_hour', 'number_of_persons', 'status', 'description as location_description', 'photo_path', 'users.name as customer_name')
                    ->join('locations', 'locations.id', '=', 'bookings.location_id')
                    ->join('users', 'users.id', '=', 'bookings.user_id')
                    ->latest('bookings.created_at')
                    ->get(),
                'recentBookings' => DB::table('bookings')
                    ->select('bookings.id as id', 'locations.name as location_name', 'booking_date', 'booking_hour', 'number_of_persons', 'status', 'description as location_description', 'photo_path', 'users.name as customer_name')
                    ->join('locations', 'locations.id', '=', 'bookings.location_id')
                    ->join('users', 'users.id', '=', 'bookings.user_id')
                    ->latest('bookings.created_at')
                    ->limit(3)
                    ->get(),
                'refundBookings' => DB::table('bookings')
                    ->select('bookings.id as id', 'locations.name as location_name', 'booking_date', 'booking_hour', 'number_of_persons', 'status', 'description as location_description', 'photo_path', 'users.name as customer_name')
                    ->join('locations', 'locations.id', '=', 'bookings.location_id')
                    ->where('status', 'cancelled')
                    ->join('users', 'users.id', '=', 'bookings.user_id')
                    ->latest('bookings.created_at')
                    ->get(),
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
        $date = $request->input('date');
    

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

        // $bookedHours = DB::table('bookings')
        //     ->select('booking_hour')
        //     ->whereDate('booking_date', $formattedDate)
        //     ->orderByDesc('created_at')
        //     ->get()
        //     ->toArray();


        // var_dump($allTimeSlot);l
        // var_dump($bookedHours);

        // print ($allTimeSlot);
        // print ($bookedHours);


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

            $location_id = $validated['location_id'];
            $number_of_persons = $validated['number_of_persons'];

            $location_price_query = DB::table('locations')
                ->select('location_price')
                ->where('locations.id', $location_id)
                ->first();

            if ($location_price_query) {
                $location_price = (int) $location_price_query->location_price; // cast to integer
                $ticket_price = $location_price * $number_of_persons;
            } else {
                // Handle missing location (optional)
                $ticket_price = 0; // or throw an exception
            }


            $bookingDate = Carbon::parse($validated['date'])->format('Y-m-d H:i:s');
            $bookingTicket = $user->bookings()->create(
                [
                    'location_id' => $validated['location_id'],
                    'booking_date' => $bookingDate,
                    'booking_hour' => $validated['time'],
                    'number_of_persons' => $validated['number_of_persons'],
                    'ticket_price' => $ticket_price,
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
                'booking' => DB::table('bookings')
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
                'booking' => DB::table('bookings')
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
                'booking' => $booking
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
                'booking' => DB::table('bookings')
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
     * Display the specified resource.
     */
    public function refund(Booking $booking)
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return Inertia::render('admin/bookings/refund/ProcessRefund', [
                'booking' => DB::table('bookings')
                    ->select('bookings.id as id', 'locations.name as location_name', 'booking_date', 'booking_hour', 'number_of_persons', 'status', 'description as location_description', 'photo_path', 'users.name as customer_name')
                    ->join('locations', 'locations.id', '=', 'bookings.location_id')
                    ->join('users', 'users.id', '=', 'bookings.user_id')
                    ->where('bookings.id', $booking->id)
                    ->latest('bookings.created_at')
                    ->first(),
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function refundStore(Booking $booking, Request $request)
    {
        //
        $user = Auth::user();

        if ($user->hasRole('customer')) {
            $validated = $request->validate([
                'receipt' => [
                    'required',
                    'image',
                    Rule::dimensions()->maxWidth(2560)->maxHeight(2560),
                ],
            ]);
            // var_dump($validated);

            if ($request->hasFile('receipt')) {
                $receipt = $request->file('receipt');
                /**
                 * Store to storage and disk. [DO NOT DELETE]
                 */
                $receiptName = str()->uuid() . '.' . $receipt->extension();
                $receipt = Storage::disk('public')->putFileAs(
                    "images/receipt",
                    $receipt,
                    $receiptName
                );

                logger("Receipt uploaded");
            }

            // var_dump($validated);
            $booking->status = 'refunded';
            $booking->receipt_photo_path = $receipt ??= null;
            $booking->save();

            return redirect(route('admin.bookings.index'));
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

        return Inertia::render('Welcome'); // Insert page
    }
}
