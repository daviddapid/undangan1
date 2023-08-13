@extends('backoffice.layouts.app')
@section('nav-scan-qr', 'active')

@section('style')
  <style>
    video {
      width: 100% !important;
    }
  </style>
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">

    {{-- scan qr on modal --}}
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <h4>Tamu Yang Telah Hadir Di Tempat</h4>
        <!-- Button trigger modal -->
        <button id="btn-start-scan" type="button" class="btn btn-primary  d-flex align-items-center" style="gap: 8px;"
          data-bs-toggle="modal" data-bs-target="#exampleModal">
          <span>Start Scan QR</span>
          <i class='bx bx-qr-scan '></i>
        </button>
      </div>
      <div class="card-body">
        <table id="myTable" class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>No Telepon</th>
              <th class="text-center">Jumlah</th>
              <th class="text-center">Kehadiran</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($guests as $i => $g)
              <tr>
                <td style="width: 9px; white-space: nowrap">{{ $i + 1 }}</td>
                <td>{{ $g->user->name }}</td>
                <td>{{ $g->phone }}</td>
                <td class="text-center">{{ $g->number_of_person }} Orang</td>

                <td style="width: 9px;white-space: nowrap">
                  @if ($g->is_present)
                    <span class="badge rounded-pill bg-info">Telah Hadir</span>
                  @else
                    <span class="badge rounded-pill bg-secondary">Belum Hadir</span>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
    <!-- Modal scanner -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Scan Qr</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
              id="btn-stop-scan"></button>
          </div>
          <div class="modal-body text-center">
            <p>Scan QR Yang Telah Anda Simpan/Dapatkan Setelah Mengisi RSVP</p>
            <div style="width: 100%; max-width: 500px; margin-inline: auto;" id="reader"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btn-stop-scan">Close</button>
          </div>
        </div>
      </div>
    </div>

    {{-- scan qr on card --}}
    {{-- <div class="col-lg-7">
      <div class="card ">
        <div class="card-header d-flex justify-content-center">
          <div>
            <button type="button" class="btn btn-primary" id="btn-start-scan">
              Start Scan Qr
            </button>
            <button type="button" class="btn btn-danger" id="btn-stop-scan">
              Stop Scan Qr
            </button>

          </div>
        </div>

        <div class="card-body d-flex justify-content-center">
          <div style="width: 100%;" id="reader"></div>
        </div>

      </div>
    </div> --}}
  </div>
@endsection

@section('script')
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable({});
    });
  </script>
  <script src="{{ asset('backoffice/myJs/scan-qr.js') }}"></script>
@endsection
