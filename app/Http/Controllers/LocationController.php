<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('backoffice.master.locations.index', compact('locations'));
    }

    public function store(Request $request)
    {
        Location::_store($request);
        return back()->with('success', 'Sukses menambah data');
    }


    public function update(Request $request, Location $location)
    {
        Location::_update($request, $location);
        return back()->with('success', 'Sukses Memperbarui data');
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return back()->with('success', 'Sukses menghapus data');
    }
}
