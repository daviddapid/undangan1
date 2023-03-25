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
        return view('admin.dashboard', compact('guests'));
    }
    public function listGuest()
    {
        $guests = Guest::query()
            ->latest()
            ->with('user')
            ->get();
        return view('admin.list-guests', compact('guests'));
    }
}
