<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user == null) {
            return Inertia::render('public/Locations', [
                'locations' => Location::all()
            ]);
        }
        if ($user->hasRole('customer')) {
            return Inertia::render('locations/Index', [
                'locations' => Location::all()
            ]);
        }

        if ($user->hasRole('admin')) {
            return Inertia::render('admin/locations/Index', [
                'locations' => Location::all()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ($user->hasRole('admin')) {
            return Inertia::render('admin/locations/Index', [
                'locations' => Location::all()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($user->hasRole('admin')) {
            return Inertia::render('admin/locations/Index', [
                'locations' => Location::all()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        if ($user->hasRole('admin')) {
            return Inertia::render('admin/locations/Index', [
                'locations' => Location::all()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        if ($user->hasRole('admin')) {
            return Inertia::render('admin/locations/Index', [
                'locations' => Location::all()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        if ($user->hasRole('admin')) {
            return Inertia::render('admin/locations/Index', [
                'locations' => Location::all()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        if ($user->hasRole('admin')) {
            return Inertia::render('admin/locations/Index', [
                'locations' => Location::all()
            ]);
        }
    }
}
