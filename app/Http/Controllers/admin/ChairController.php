<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Chair;
use App\Models\Guest;
use Illuminate\Http\Request;

class ChairController extends Controller
{
    public function index()
    {
        $chairs = Chair::query()->get();
        $total_tamu = Guest::query()->where('status', 'attend')->sum('number_of_person');
        // dd($total_tamu);
        return view('backoffice.list-chairs', compact('chairs', 'total_tamu'));
    }
    public function store(Request $request)
    {
        if (Chair::where('number', $request->number)->first()) {
            return back()->with('failed', 'Kursi Dengan Nomor ' . $request->number . ' Telah tersedia');
        }
        $c = new Chair();
        $c->number = $request->number;
        $c->save();

        return back()->with('success', "Sukses Menambah Kursi Baru : $c->number");
    }
    public function updateOrDelete(Chair $chair, Request $request)
    {
        switch ($request->method) {
            case 'delete':
                $chair->delete();
                return back()->with('success', 'Sukses Menghapus Kursi ' . $chair->number);

                break;
            case 'update':
                $old_number = $chair->number;
                $chair->number = $request->number;
                $chair->save();

                return back()->with('success', 'Sukses Memperbarui Nomor Kursi ' . $old_number . ' Menjadi ' . $request->number);
                break;
        }
    }
}
