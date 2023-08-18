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

        // tidak hadir danger
        // bersedia hadir info
        // telah hadir green
        // belum hadir warning
        // total tamu primary
        $total_tamu = $guests->sum('number_of_person');
        $total_tidak_hadir = $guests->where('status', 'absent')->sum('number_of_person');
        $total_bersedia_hadir = $guests->where('status', 'attend')->sum('number_of_person');
        $total_belum_hadir = $guests->where('is_present', false)->sum('number_of_person');
        $total_telah_hadir = $guests->where('is_present', true)->sum('number_of_person');

        return view('backoffice.tamu.list-guests', compact('guests', 'total_tamu', 'total_bersedia_hadir', 'total_tidak_hadir', 'total_belum_hadir', 'total_telah_hadir'));
    }
    public function qrCode(Guest $guest)
    {
        return view('backoffice.tamu.qr-code', compact('guest'));
    }
}
