<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QrController extends Controller
{
    public function index()
    {
        $guest = Auth::user()->guest;
        return view('guest.my-qr', compact('guest'));
    }
    public function scanQr($guest_id)
    {
        // try {
        $guest = Guest::find($guest_id);

        // dd($guest->chairs->count() < 1);

        if ($guest == null) {
            return [
                'status' => 'qr-not-valid',
                'title' => 'QR Tidak Valid',
                'message' => 'QR Anda Tidak Ditemukan atau Tidak Valid',
            ];
        }

        if ($guest->is_present) {
            return [
                'status' => 'already-scanned',
                'title' => 'QR Telah Berhasil Di Scan',
                'message' => 'Selamat Datang Di Pernikahan Kami, Dipersilahkan Duduk Di Tempat Yang Telah Disediakan',
                'chairs' => $guest->chairs
            ];
        }

        $guest->is_present = true;
        // dd($guest->chairs, $guest->chairs->count());
        $guest->save();
        return [
            'status' => 'ok',
            'message' => 'Selamat Datang Di Pernikahan Kami, Dipersilahkan Duduk Di Tempat Yang Telah Disediakan',
            'guest' => $guest,
            'chairs' => $guest->chairs
        ];
        // } catch (\Exception $e) {
        //     return [
        //         'status' => 'error',
        //         'message' => $e->getMessage()
        //     ];
        // }
    }
}
