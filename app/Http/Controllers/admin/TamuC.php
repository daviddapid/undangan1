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
    public function setKursi(Request $request, Guest $guest)
    {
        $chairs = Chair::all();
        $guest_chairs = $guest->chairs()->select(['id'])->get();
        // dd($guest_chairs);
        return view('backoffice.tamu.set-kursi', compact('chairs', 'guest', 'guest_chairs'));
    }
    public function storeKursi(Request $request, Guest $guest)
    {
        $guest_chairs = $guest->chairs;
        foreach ($guest_chairs as $g_chair) {
            $g_chair->guest_id = null;
            $g_chair->save();
        }
        if ($request->chairs_id) {
            foreach ($request->chairs_id as $c_id) {
                $chair = Chair::find($c_id);
                $chair->guest_id = $guest->id;
                $chair->save();
            }
        }
        return back();
    }
    public function generateRandomKursi()
    {
        $guests_no_chair = Guest::query()->where('status', 'attend')->doesntHave('chairs')->get();
        $empty_chairs = Chair::query()->where('guest_id', null)->get();

        // ketersediaan kursi minus dari tamu yang tdk punya kursi ? maka return back
        $selisih_kursi_tamu = $empty_chairs->count() - $guests_no_chair->sum('number_of_person');
        if ($selisih_kursi_tamu < 0) {
            return back()->with('failed', 'Jumlah Kursi Tidak Mencukupi Untuk Tamu Yang Saat Ini, Harap Menambah Jumlah Kursi.');
        }
        $current_chair_number = 0;
        foreach ($guests_no_chair as $g) {
            for ($i = 1; $i <= $g->number_of_person; $i++) {
                $empty_chairs[$current_chair_number]['guest_id'] = $g->id;
                $empty_chairs[$current_chair_number]->save();
                $current_chair_number++;
            }
        }

        return back()->with('success', 'Sukses Generate Kursi Tamu');
    }
}
