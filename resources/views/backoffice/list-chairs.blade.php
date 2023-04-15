@extends('backoffice.layouts.app')
@section('nav-chair-list', 'active')

@section('script')
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable({});
    });

    function handleEdit(chair, url) {
      $('#edit-number').val(chair.number);
      $('#form-edit').attr('action', url);
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
  @if (session('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: "{{ session('success') }}",
        // footer: '<a href="">Why do I have this issue?</a>'
      })
    </script>
  @endif
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

        <h5 class="badge bg-label-info fs-5 me-3">
          <span>Total Tamu</span>
          <span class="badge bg-info ms-2">{{ $total_tamu }} Orang</span>
        </h5>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-tambah">Tambah Kursi</button>
      </div>
    </div>

    <div class="row">
      <input type="hidden" id="guest_id" name="guest_id">
      @foreach ($chairs as $chair)
        <div class="col-lg-2 col-6 mb-3">
          <div class="card h-100 card-kursi"
            onclick="handleEdit({{ $chair }}, '{{ route('chair.update', $chair->id) }}')"
            style="  @if ($chair->guest_id != null) background-color: var(--bs-gray); @endif @if ($chair->guest->is_present) background-color: var(--bs-blue);color:white; @endif"
            data-bs-toggle="modal" data-bs-target="#modal-edit">
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
  </div>

  <!-- Modal tambah -->
  <div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kursi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('chair.store') }}" method="post" id="form-tambah">
            @csrf
            <div class="form-label">Nomor Kursi</div>
            <input type="text" name="number" class="form-control">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" form="form-tambah" class="btn btn-primary">Tambah</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal edit dan delete -->
  <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" id="form-edit">
            @csrf
            <div class="form-label">Nomor Kursi</div>
            <input type="text" name="number" class="form-control" id="edit-number">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" form="form-edit" class="btn btn-danger" name="method" value="delete">Delete</button>
          <button type="submit" form="form-edit" class="btn btn-warning" name="method" value="update">Update</button>
        </div>
      </div>
    </div>
  </div>
@endsection
