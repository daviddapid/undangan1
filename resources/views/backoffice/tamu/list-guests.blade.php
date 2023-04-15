@extends('backoffice.layouts.app')
@section('nav-tamu-undangan', 'active')

@section('script')
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable({});
    });
  </script>
  @if (session('failed'))
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: "{{ session('failed') }}",
        // footer: '<a href="">Why do I have this issue?</a>'
      })
    </script>
  @endif
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb d-flex align-items-center">
          <li class="breadcrumb-item fs-4 text-primary active"><a href="{{ route('tamu-undangan') }}">Tamu Undangan</a></li>
        </ol>
      </nav>
      <div class="d-flex">
        @if ($selisih_kursi_tamu < 0)
          <h3 class="badge bg-label-danger me-2">
            <span class="fs-6 me-1">Kekurangan Kursi</span>
            <span class="badge bg-danger fs-6">{{ $selisih_kursi_tamu }}</span>
          </h3>
        @elseif($selisih_kursi_tamu >= 0)
          <h3 class="badge bg-label-info me-2">
            <span class="fs-6 me-1">Kelebihan Kursi</span>
            <span class="badge bg-info fs-6">+{{ $selisih_kursi_tamu }}</span>
          </h3>
        @endif

        <div>
          <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-generate">
            <i class='bx bx-analyse' style="vertical-align: text-bottom"></i>
            <span>Generate Kursi</span>
          </button>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4 class="mb-0">Daftar Tamu Undangan</h4>
      </div>
      <div class="card-body">
        <table id="myTable" class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>No Telepon</th>
              <th class="">Jumlah</th>
              <th class="text-center">Nomor Kursi</th>
              <th class="text-center">Status</th>
              <th class="text-center">Kehadiran</th>
              <th class="text-center">Qr Code</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($guests as $i => $g)
              <tr>
                <td style="width: 9px; white-space: nowrap">{{ $i + 1 }}</td>
                <td>{{ $g->user->name }}</td>
                <td>{{ $g->phone }}</td>
                <td class="">{{ $g->number_of_person }} Orang</td>
                <td class="" style="width: 9px; white-space: nowrap;">
                  <a class="btn btn-primary" href="{{ route('tamu-undangan.setKursi', $g->id) }}">
                    <i class='bx bx-chair align-text-bottom'></i>
                    Set Nomor Kursi
                  </a>
                  {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-setKursi"
                    onclick="handleSetKursi($g->id)">Set Nomor
                    Kursi</button> --}}
                </td>
                <td style="width: 9px;white-space: nowrap;">
                  @switch($g->status)
                    @case('attend')
                      <span class="badge
                rounded-pill bg-success">Bersedia Hadir</span>
                    @break

                    @case('absent')
                      <span class="badge rounded-pill bg-danger">Berhalangan</span>
                    @break

                    @case('pending')
                      <span class="badge rounded-pill bg-warning">Pending</span>
                    @break

                    @default
                  @endswitch
                </td>
                <td style="width: 9px;white-space: nowrap">
                  @if ($g->is_present)
                    <span class="badge rounded-pill bg-info">Telah Hadir</span>
                  @else
                    <span class="badge rounded-pill bg-secondary">Belum Hadir</span>
                  @endif
                </td>
                <td style="white-space: nowrap; width: 19px;" class="text-center">
                  {{-- <button class="btn btn-primary p-2 d-flex"><i class='bx bx-qr-scan '></i></button> --}}
                  <a href="{{ route('tamu-undangan.qrCode', $g->id) }}">

                    <i class='bx bx-qr-scan fs-4'></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    {{-- MODAL SET KURSI TAMU --}}
    {{-- <div class="modal fade" id="modal-setKursi" tabindex="-1" aria-labelledby="modal-setKursiLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="modal-setKursiLabel">Atur Kursi Tamu</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('tamu-undangan.setKursi') }}" method="post" id="form-setKursi">
              @csrf
              <div class="row">
                @section('style')
                  <style>
                    .card-kursi:has(.checkbox-kursi:checked) {
                      background-color: var(--bs-success);
                      color: white;
                    }
                  </style>
                @endsection
                <input type="hidden" id="guest_id" name="guest_id">
                @foreach ($chairs as $chair)
                  <x-backoffice.checkbox-setKursi :chair=$chair />
                @endforeach
                @section('script')
                  <script>
                    function handleSetKursi(guest_id) {
                      $('$guest_id').val(guest_id);
                    }
                  </script>
                @endsection
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" form="form-setKursi">Simpan</button>
          </div>
        </div>
      </div>
    </div> --}}
  </div>

  <!-- Modal Generate Kursi -->
  <div class="modal fade" id="modal-generate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Generate Kursi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('tamu-undangan.generate-kursi') }}" method="POST" id="form-generate">
            @csrf
            Tamu Yang Belum Memiliki Kursi, Akan Mendapatkan Kursi Dengan Nomor Urut, Sesuai Jumlah Dari Rombongan Tamu
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="form-generate">Generate</button>
        </div>
      </div>
    </div>
  </div>
@endsection
