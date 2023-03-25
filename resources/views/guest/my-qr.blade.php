@extends('guest.layouts.main')
@section('content')
  <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;flex-direction: column;">
    {!! QrCode::size(300)->generate(route('my-qr.scan', $guest->id)) !!}
    <h5 class="mt-5" style="font-family: Arial, Helvetica, sans-serif">Harap Tunjukkan QR Ini Kepada Admin Ditempat</h5>
  </div>
@endsection
