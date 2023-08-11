<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Chair;
use App\Models\Guest;
use Illuminate\Http\Request;

class TamuC extends Controller
{
    public function index()
    {
        $guests = Guest::query()
            ->latest()
            ->with('user')
            ->get();
        $chairs = Chair::all();

        $guests_no_chair = Guest::query()->where('status', 'attend')->doesntHave('chairs')->get();
        $empty_chairs = Chair::query()->where('guest_id', null)->get();
        // ketersediaan kursi minus dari tamu yang tdk punya kursi ? maka return back
        $selisih_kursi_tamu = $empty_chairs->count() - $guests_no_chair->sum('number_of_person');

        return view('backoffice.tamu.list-guests', compact('guests', 'chairs', 'selisih_kursi_tamu'));
    }
    public function qrCode(Guest $guest)
    {
        return view('backoffice.tamu.qr-code', compact('guest'));
    }
}
