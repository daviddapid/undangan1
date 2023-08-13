@extends('backoffice.layouts.app')
@section('nav-ucapan', 'active')

@section('script')
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable({});
    });

    function toggleVisiblity(event, comment_id, url) {
      console.log(url);
      fetch(url, {
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          method: 'post',
        })
        .then(res => {
          console.log(res);
          return res.json()
        })
        .then(data => {
          $('#total-showed').html(data.showed);
          $('#total-hidden').html(data.hidden);
          console.log(data);
        })
      if (event.checked) {
        $('#col-visiblity-' + comment_id).html(
          `<span class="badge badge-center rounded-pill p-3 bg-label-success" id="badge-${comment_id}"></span>`
        )
        $('#badge-' + comment_id).html(
          '<i class="bx bx-check fs-3"></i>'
        );
      } else {
        $('#col-visiblity-' + comment_id).html(
          `<span class="badge badge-center rounded-pill p-3 bg-label-danger" id="badge-${comment_id}"></span>`
        )
        $('#badge-' + comment_id).html(
          '<i class="bx bx-x fs-3"></i>'
        );
      }
    }
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
          <li class="breadcrumb-item fs-4 text-primary active"><a href="{{ route('admin.comment.index') }}">Daftar
              Ucapan</a></li>
        </ol>
      </nav>
      <div class="d-flex">
        <h3 class="badge bg-label-danger me-2">
          <span class="fs-6 me-1">Disembunyikan</span>
          <span class="badge bg-danger fs-6" id="total-hidden">{{ $disembunyikan }}</span>
        </h3>
        <h3 class="badge bg-label-success me-2">
          <span class="fs-6 me-1">Ditampilkan</span>
          <span class="badge bg-success fs-6" id="total-showed">{{ $ditampilkan }}</span>
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
              <th style="width: 19px; white-space: nowrap;">#</th>
              <th class="align-middle text-center">Nama</th>
              <th class="align-middle text-center">Pesan</th>
              <th class="text-center align-middle" style="width: 19px;">Visible</th>
              <th class="text-center align-middle" style="width: 19px;">Tampilkan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($comments as $i => $c)
              <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->message }}</td>
                <td class="text-center" id="col-visiblity-{{ $c->id }}">
                  @switch($c->is_show)
                    @case(true)
                      <span class="badge badge-center rounded-pill p-3 bg-label-success"><i
                          class='bx bx-check fs-3'></i></span>
                    @break

                    @case(false)
                      <span class="badge badge-center rounded-pill p-3 bg-label-danger"><i class='bx bx-x fs-3'></i></span>
                    @break
                  @endswitch
                </td>
                <td>
                  <div class="form-check form-switch d-flex justify-content-center">
                    <input class="form-check-input"
                      onclick="toggleVisiblity(this,{{ $c->id }}, '{{ route('admin.comment.update', $c->id) }}')"
                      type="checkbox" role="switch" style="width: 50px; height: 28px;" @checked($c->is_show)>
                  </div>
                  {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-update"><i
                      class='bx bxs-edit'></i> --}}
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
  <!-- Modal -->
  <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="modal-updateLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modal-updateLabel">Tampilkan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apa anda yakin untuk mengubah visiblitas ucapan ini ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Ubah</button>
        </div>
      </div>
    </div>
  </div>
@endsection
