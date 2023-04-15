@extends('backoffice.layouts.app')
@section('nav-tamu-undangan', 'active')

@section('script')
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable({});
    });
  </script>
@endsection
@section('style')
  <style>
    .card-kursi:has(.checkbox-kursi:checked) {
      background-color: var(--bs-success);
      color: white !important;
    }

    .card-kursi:has(.checkbox-kursi:disabled) {
      background-color: var(--bs-gray);
    }
  </style>
@endsection
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y" style="position: relative">
    <div class="d-flex justify-content-between">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb d-flex align-items-center">
          <li class="breadcrumb-item fs-4"><a href="{{ route('tamu-undangan') }}">Tamu Undangan</a></li>
          <i class='bx bx-chevron-right fs-2'></i>
          <li class="breadcrumb-item fs-4 active text-primary" aria-current="page">Set Kursi </li>
        </ol>
      </nav>
      <div>
        <h5 class="badge bg-label-primary fs-5">
          <span> {{ $guest->user->name }}</span>
          <span class="badge bg-primary ms-2">{{ $guest->number_of_person }} Orang</span>
        </h5>

      </div>
    </div>

    <form action="{{ route('tamu-undangan.storeKursi', $guest->id) }}" method="POST">
      @csrf
      <div class="row">
        <input type="hidden" id="guest_id" name="guest_id">
        @foreach ($chairs as $chair)
          <div class="col-lg-2 col-6 mb-3">
            <div class="card h-100 card-kursi" style="position: relative;">
              <input type="checkbox" style="position: absolute; width: 100%; height: 100%; opacity: 0;"
                value="{{ $chair->id }}" class="checkbox-kursi" name="chairs_id[]"
                @if ($chair->guest_id == $guest->id) checked @endif @disabled(($chair->guest_id != $guest->id) & ($chair->guest_id != null))>
              <div class="card-body text-center d-flex"
                style="flex-direction: column; justify-content: center; align-items: center;">
                <h5 class="mb-0" style="color: inherit;">{{ $chair->number }}</h5>
                @if ($chair->guest)
                  <h6 class="mb-0" style="color: inherit;">{{ $chair->guest->user->name }}</h6>
                @endif

              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="fixed-bottom">
        <div class="card py-3">

          <button class="btn btn-primary" style="margin-left: auto; margin-right: 19.999px;">
            <i class='bx bx-check-circle align-text-bottom'></i>
            <span>Simpan</span>

          </button>
        </div>
      </div>
    </form>
  </div>
@endsection
