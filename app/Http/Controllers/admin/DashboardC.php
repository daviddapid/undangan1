<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class DashboardC extends Controller
{
    public function index()
    {
        $guests = Guest::query()
            ->latest()
            ->with('user')
            ->get();
        return view('backoffice.dashboard', compact('guests'));
    }
    public function listGuest()
    {
        $guests = Guest::query()
            ->latest()
            ->with('user')
            ->get();
        return view('backoffice.list-guests', compact('guests'));
    }
    public function scanQr()
    {
        $guests = Guest::query()->where('is_present', true)->latest()->get();
        return view('backoffice.scan-qr', compact('guests'));
    }
}
