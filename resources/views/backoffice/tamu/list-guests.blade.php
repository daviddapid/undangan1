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
          <li class="breadcrumb-item fs-4 text-primary active"><a href="{{ route('tamu-undangan') }}">Tamu
              Undangan</a></li>
        </ol>
      </nav>
      <div class="d-flex">
        <h3 class="badge bg-label-danger me-2">
          <span class="fs-6 me-1">Tidak Hadir</span>
          <span class="badge bg-danger fs-6">{{ $total_tidak_hadir }}</span>
        </h3>
        <h3 class="badge bg-label-info me-2">
          <span class="fs-6 me-1">Bersedia Hadir</span>
          <span class="badge bg-info fs-6">{{ $total_bersedia_hadir }}</span>
        </h3>
        <h3 class="badge bg-label-warning me-2">
          <span class="fs-6 me-1">Belum Hadir</span>
          <span class="badge bg-warning fs-6">{{ $total_belum_hadir }}</span>
        </h3>
        <h3 class="badge bg-label-success me-2">
          <span class="fs-6 me-1">Telah Hadir</span>
          <span class="badge bg-success fs-6">{{ $total_telah_hadir }}</span>
        </h3>
        <h3 class="badge bg-label-primary me-2">
          <span class="fs-6 me-1">Total Tamu</span>
          <span class="badge bg-primary fs-6">{{ $total_tamu }}</span>
        </h3>
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
              <th class="align-middle text-center">Nama</th>
              <th class="align-middle text-center">No Telepon</th>
              <th class="align-middle text-center">Jumlah</th>
              <th class="text-center align-middle">Ketersediaan</th>
              <th class="text-center align-middle" style="width: 19px;">Telah Hadir</th>
              <th class="text-center align-middle">Qr Code</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($guests as $i => $g)
              <tr>
                <td style="width: 9px; white-space: nowrap">{{ $i + 1 }}</td>
                <td>{{ $g->user->name }}</td>
                <td>{{ $g->phone }}</td>
                <td class="">{{ $g->number_of_person }} Orang</td>
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

@endsection
