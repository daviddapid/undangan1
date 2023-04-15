@extends('backoffice.layouts.app')
@section('nav-tamu-undangan', 'active')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y" style="position: relative">
    <div class="d-flex justify-content-between">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb d-flex align-items-center">
          <li class="breadcrumb-item fs-4"><a href="{{ route('tamu-undangan') }}">Tamu Undangan</a></li>
          <i class='bx bx-chevron-right fs-2'></i>
          <li class="breadcrumb-item fs-4 active text-primary" aria-current="page">Qr Code </li>
        </ol>
      </nav>
      {{-- <div>
        <h5 class="badge bg-label-primary fs-5">
          <span> {{ $guest->user->name }}</span>
          <span class="badge bg-primary ms-2">{{ $guest->number_of_person }} Orang</span>
        </h5>
      </div> --}}
    </div>
    <div class="center w-100 h-100"
      style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
      {!! QrCode::size(300)->generate(route('my-qr.scan', $guest->id)) !!}
      <p>Qr Code Untuk : </p>
      <p>{{ $guest->user->name }}</p>
    </div>
  </div>
@endsection
