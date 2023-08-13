@extends('guest.layouts.main')
@section('content')
  <div class="container d-flex justify-content-center align-items-center"
    style="height: 100vh;flex-direction: column; position: relative;">
    @if ($guest->is_present)
      <video src="{{ asset('guest/assets/lottie/success.mp4') }}" autoplay loop muted
        style="width: 100%; position: absolute; top: 0"></video>
      <p style="position: absolute;">QR Code Anda Telah Di Scan</p>
    @else
      {!! QrCode::size(300)->generate(route('my-qr.scan', $guest->id)) !!}
      <h5 class="mt-5 text-center" style="font-family: Arial, Helvetica, sans-serif">Harap Tunjukkan QR Ini Kepada Admin
        Ditempat</h5>
    @endif
  </div>
@endsection
