@extends('backoffice.layouts.app')
@section('nav-tamu-undangan', 'active')

@section('script')
  <script src="backoffice/myJs/guest-chart.js"></script>
  <script src="{{ asset('backoffice/myJs/editor-myTable.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable({});
    });
  </script>
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
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
              <th class="">Nomor Meja</th>
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
                <td class="david-edit-ables" data-guest_id="{{ $g->id }}">
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="david-inline-value">{{ $g->no_meja }}</span>

                    <i class='bx bx-edit-alt david-inline-editx'></i>
                  </div>
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
                  <i class='bx bx-qr-scan fs-4'></i>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
@endsection
