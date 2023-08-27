<?php

namespace App\Http\Controllers;

use App\Models\CoupleStory;
use Illuminate\Http\Request;

class CoupleStoryC extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stories = CoupleStory::all();
        return view('backoffice.master.couple_story.index', compact('stories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'max:207'
        ]);

        CoupleStory::_store($request);
        return back()->with('success', 'Sukses menambahkan data baru');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CoupleStory $coupleStory)
    {
        $request->validate([
            'description' => 'max:207'
        ]);
        CoupleStory::_update($coupleStory, $request);

        return back()->with('success', 'Sukses memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CoupleStory $coupleStory)
    {
        CoupleStory::_delete($coupleStory);
        return back()->with('success', 'Sukses menghapus data');
    }
}
