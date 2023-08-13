<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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

        $tamu_bersedia = $guests->where('status', 'attend');
        $total_tamu = $tamu_bersedia->sum('number_of_person');
        $total_tamu_hadir = $tamu_bersedia->where('is_present', true)->sum('number_of_person');
        $total_tamu_belum_hadir = $tamu_bersedia->where('is_present', false)->sum('number_of_person');
        return view('backoffice.tamu.list-guests', compact('guests', 'total_tamu', 'total_tamu_hadir', 'total_tamu_belum_hadir'));
    }
    public function qrCode(Guest $guest)
    {
        return view('backoffice.tamu.qr-code', compact('guest'));
    }
}
