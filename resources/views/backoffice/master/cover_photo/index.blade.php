@extends('backoffice.layouts.app')
@section('nav-cover-photo', 'active')
@section('style')
  <link rel="stylesheet" href="{{ asset('backoffice/assets/css/couplePhotos.css') }}">
@endsection
@push('script-stack')
  @if (session('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: "{{ session('success') }}",
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
    $('.dropify').dropify({
      tpl: {
        message: '<div class="dropify-message"><span class="file-icon" /> <p></p></div>',
      }
    });
  </script>
@endpush
@section('content')

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between mb-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb d-flex align-items-center">
          <li class="breadcrumb-item fs-4  "><a href="#">Master Data</a>
          <li class="breadcrumb-item fs-4 text-primary active"><a href="{{ route('admin.comment.index') }}">Cover
              Photo</a>
          </li>
        </ol>
      </nav>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-4 mb-3 px-2">
        <div class="card">
          <div class="img-fluid wrapper-potrait">
            @if ($photo->photo != null)
              <img class="img-fluid img-potrait" src="{{ asset('storage/' . $photo->photo) }}" alt=""
                style="object-fit: contain">
              <div class="mask-edit" data-bs-toggle="modal" data-bs-target="#modal-edit"
                onclick="handleEdit('{{ route('master.couplePhotos.update', $photo->id) }}', '{{ asset('storage/' . $photo->photo) }}')">
                <i class='bx bxs-edit'></i>
              </div>
            @else
              <div class="empty-img" data-bs-toggle="modal" data-bs-target="#modal-edit"
                onclick="handleEdit('{{ route('master.couplePhotos.update', $photo->id) }}', null)">
                <i class='bx bxs-edit'></i>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="modal-editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modal-editLabel">Perbarui Foto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" id="form-edit" enctype="multipart/form-data"
            action="{{ route('master.coverPhoto.update', $photo->id) }}">
            @csrf
            @method('put')
            <input id="photo-edit" type="file" class="dropify" name="photo"
              data-allowed-file-extensions="jpg jpeg png webp" data-allowed-formats="portrait"
              data-default-file="{{ asset('storage/' . $photo->photo) }}" required />
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="form-edit">Save
            changes</button>
        </div>
      </div>
    </div>
  </div>

@endsection
