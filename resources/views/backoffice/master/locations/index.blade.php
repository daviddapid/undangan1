@extends('backoffice.layouts.app')
@section('nav-locations', 'active')
@section('style')
  <link rel="stylesheet" href="{{ asset('backoffice/plugins/dropify-master/dist/css/dropify.min.css') }}">
  <style>
    .card-location iframe {
      width: 100%;
      height: 150px;
    }
  </style>
@endsection
@section('script')
  @if (session('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: "{{ session('success') }}",
      })
    </script>
  @endif
  @if (session('exception'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: "{{ session('exception') }}",
      })
    </script>
  @endif
  @if ($errors->any())
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Gagal Menambahkan Data',
        text: 'Periksa apakah semua data yang diisi valid',
      })
    </script>
  @endif
  <script>
    function handleEdit(url, location) {
      console.log(location);
      $('#form-update').attr('action', url);
      $('#title-edit').val(location.title);
      $('#date-edit').val(location.date);
      $('#time_start-edit').val(location.time_start);
      $('#time_end-edit').val(location.time_end);
      $('#map-edit').val(location.map);
    }

    function handleDelete(url) {
      $('#form-delete').attr('action', url);
    }
  </script>
@endsection
@section('content')

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between mb-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb d-flex align-items-center">
          <li class="breadcrumb-item fs-4  "><a href="#">Master Data</a>
          <li class="breadcrumb-item fs-4 text-primary active"><a href="{{ route('admin.comment.index') }}">Couple
              Location</a>
          </li>
        </ol>
      </nav>
      <div>
        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modal-add">
          <i class='bx bx-plus align-text-top'></i>
          <span>Add Location</span>
        </button>
      </div>
    </div>
    <div class="row">
      @foreach ($locations as $l)
        <div class="col-lg-4">
          <div class="card card-location">
            <div class="card-header border-bottom">
              <h4 class="card-title mb-0 text-center">{{ $l->title }}</h4>
            </div>
            {{-- <div class="card-body"> --}}
            <div class="w-100">
              {!! $l->map !!}
            </div>
            {{-- </div> --}}
            <table class="w-100 table">
              <tr>
                <td class="pe-1">Date</td>
                <td class="p-0">:</td>
                <td class="">{{ $l->getFormatedDate() }}</td>
              </tr>
              <tr>
                <td class="pe-1">Time Start</td>
                <td class="p-0">:</td>
                <td class="">{{ $l->time_start }}</td>
              </tr>
              <tr>
                <td class="pe-1">Time End</td>
                <td class="p-0">:</td>
                <td class="">{{ $l->time_end }}</td>
              </tr>
            </table>
            <div class="card-footer d-flex justify-content-end gap-1 mt-3">
              <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete"
                onclick="handleDelete('{{ route('master.locations.destroy', $l->id) }}')">Delete</button>
              <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-edit"
                onclick="handleEdit('{{ route('master.locations.update', $l->id) }}', {{ $l }})">Edit</button>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  {{-- modal add --}}
  <div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="modal-addLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modal-addLabel">Add Couple location</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('master.locations.store') }}" method="post" id="form-store">
            @csrf
            <div class="mb-3">
              <label for="title">Title</label>
              <input type="text" required name="title" id="title" class="form-control">
            </div>
            <div class="mb-3">
              <label for="date">Date</label>
              <input type="date" required name="date" id="date" class="form-control">
            </div>
            <div class="mb-3">
              <label for="time_start">Time Start</label>
              <input type="time" required name="time_start" id="time_start" class="form-control">
            </div>
            <div class="mb-3">
              <label for="time_end">Time End</label>
              <input type="time" required name="time_end" id="time_end" class="form-control">
            </div>
            <div class="mb-3">
              <label for="map">Map</label>
              <input type="text" required name="map" id="map" class="form-control"
                placeholder='<iframe src="...">...</iframe>'>
              <div id="emailHelp" class="form-text">Get your destination iframe on
                <a href="https://www.google.com/maps" target="_blank" rel="noopener noreferrer">google map</a> , then
                copy iframe of your
                destination location
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="form-store">Store</button>
        </div>
      </div>
    </div>
  </div>
  {{-- modal edit --}}
  <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="modal-editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modal-editLabel">Edit Couple location</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" id="form-update">
            @csrf
            @method('put')
            <div class="mb-3">
              <label for="title">Title</label>
              <input type="text" required name="title" id="title-edit" class="form-control">
            </div>
            <div class="mb-3">
              <label for="date">Date</label>
              <input type="date" required name="date" id="date-edit" class="form-control">
            </div>
            <div class="mb-3">
              <label for="time_start">Time Start</label>
              <input type="time" required name="time_start" id="time_start-edit" class="form-control">
            </div>
            <div class="mb-3">
              <label for="time_end">Time End</label>
              <input type="time" required name="time_end" id="time_end-edit" class="form-control">
            </div>
            <div class="mb-3">
              <label for="map">Map</label>
              <input type="text" required name="map" id="map-edit" class="form-control"
                placeholder='<iframe src="...">...</iframe>'>
              <div id="emailHelp" class="form-text">Get your destination iframe on <a
                  href="https://www.google.com/maps" target="_blank" rel="noopener noreferrer">google map</a> , then
                copy iframe of your
                destination location</div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="form-update">Update</button>
        </div>
      </div>
    </div>
  </div>
  {{-- modal delete --}}
  <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="modal-deleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modal-deleteLabel">Delete Couple location</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" id="form-delete">
            @csrf
            @method('delete')
            Apa anda yakin untuk menghapus data ini ?
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" form="form-delete">Delete</button>
        </div>
      </div>
    </div>
  </div>
@endsection
