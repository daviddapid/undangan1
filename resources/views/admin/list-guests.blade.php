@extends('admin.layouts.app')
@section('script')
  <script src="admin/myJs/guest-chart.js"></script>
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
              <th class="text-center">Jumlah</th>
              <th class="text-center">Status</th>
              <th class="text-center">Qr Code</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($guests as $i => $g)
              <tr>
                <td style="width: 9px; white-space: nowrap">{{ $i + 1 }}</td>
                <td>{{ $g->user->name }}</td>
                <td>{{ $g->phone }}</td>
                <td class="text-center">{{ $g->number_of_person }} Orang</td>
                <td style="width: 9px;white-space: nowrap;">
                  @switch($g->status)
                    @case('attend')
                      <span class="badge
                rounded-pill bg-success">Bersedia</span>
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
                <td style="white-space: nowrap; width: 19px;">
                  <button class="btn btn-primary p-2 d-flex"><i class='bx bx-qr-scan fs-3'></i></button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
@endsection
