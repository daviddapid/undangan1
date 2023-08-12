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

        $guests_no_chair = Guest::query()->where('status', 'attend')->get();

        return view('backoffice.tamu.list-guests', compact('guests'));
    }
    public function qrCode(Guest $guest)
    {
        return view('backoffice.tamu.qr-code', compact('guest'));
    }
}
