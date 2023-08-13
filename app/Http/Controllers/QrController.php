<?php

namespace App\Http\Controllers;

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
        $guest = Guest::find($guest_id);


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
            ];
        }

        $guest->is_present = true;
        $guest->save();
        return [
            'status' => 'ok',
            'message' => 'Selamat Datang Di Pernikahan Kami, Dipersilahkan Duduk Di Tempat Yang Telah Disediakan',
            'guest' => $guest,
        ];
    }
}
