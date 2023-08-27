<?php

namespace App\Http\Controllers;

use App\Models\CoupleBio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Constraint\Count;

class CoupleBioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $couple_bios = CoupleBio::all();

        return view('backoffice.master.couple_bio.index', compact('couple_bios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'max:219'
        ]);

        if (CoupleBio::all()->count() > 2) {
            return back()->with('error', 'Biodata tidaka boleh lebih dari 2');
        }
        CoupleBio::_create($request);
        return back()->with('success', 'sukses menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(CoupleBio $coupleBio)
    {
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CoupleBio $coupleBio)
    {
        $request->validate([
            'description' => 'max:219'
        ]);

        CoupleBio::_update($request, $coupleBio);

        return back()->with('success', 'sukses memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CoupleBio $coupleBio)
    {
        Storage::delete($coupleBio->photo);
        $coupleBio->delete();

        return back()->with('success', 'Sukses menghapus data ini');
    }
}
