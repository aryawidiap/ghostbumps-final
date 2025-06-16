<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
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
            return Inertia::render('admin/locations/AllLocations', [
                'locations' => Location::all()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return Inertia::render('admin/locations/Create', []);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'photo' => [
                    'required',
                    'image',
                    Rule::dimensions()->maxWidth(2560)->maxHeight(2560),
                ],
                'address' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:1000'],
                'short_description' => ['required', 'string', 'max:500'],
            ]);

            // var_dump($validated);
            // Photo file
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                /**
                 * Store to storage and disk. [DO NOT DELETE]
                 */
                $photoName = str()->uuid() . '.' . $photo->extension();
                $photo = Storage::disk('public')->putFileAs(
                    "images/",
                    $photo,
                    $photoName
                );

                logger("Logo uploaded!");
            }

            // var_dump($validated);
            $location = Location::create(
                [
                    'name' => $validated['name'],
                    'photo_path' => $photo ??= null,
                    'address' => $validated['address'],
                    'description' => $validated['description'],
                    'short_description' => $validated['short_description'],
                ]
            );

            return redirect(route('admin.locations.create.success', $location));
        }
    }

    /**
     * Display success for location insert
     */
    public function success(Location $location)
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return Inertia::render('admin/locations/Success', [
                'location' => $location
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return Inertia::render('admin/locations/Show', [
                'location' => $location
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {

            // if file is empty -> dont change the image

            // if file filled, upload
            return Inertia::render('admin/locations/Edit', [
                'location' => $location
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $user = Auth::user();
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
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            // add deleted_at on location
        }
    }
}
