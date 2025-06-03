<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Admin and employee can see all bookings

        // Customer can see their own bookings only
        if ($request->user()->hasRole('customer')) {
            $user = Auth::user();
            return Inertia::render('bookings/index', [
                'bookings' => $user->bookings()->latest()->get()
            ]);
        }

        $user = Auth::user();
        return Inertia::render('bookings/Index', [
            'bookings' => $user->bookings()->latest()->get()
        ]);
        // 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Customer can see their own bookings only
        if ($request->user()->hasRole('customer')) {
            $user = Auth::user();
            return Inertia::render('bookings/Create', [
                'bookings' => $user->bookings()->latest()->get()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
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
}
