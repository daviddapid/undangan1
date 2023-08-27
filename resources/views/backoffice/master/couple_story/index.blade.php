@extends('backoffice.layouts.app')
@section('nav-couple-story', 'active')
@section('style')
  <link rel="stylesheet" href="{{ asset('backoffice/plugins/dropify-master/dist/css/dropify.min.css') }}">
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

  <script src="{{ asset('backoffice/plugins/dropify-master/dist/js/dropify.min.js') }}"></script>
  <script>
    $('.dropify').dropify({
      tpl: {
        message: '<div class="dropify-message"><span class="file-icon" /> <p></p></div>',
      }
    });

    function handleEdit(url, pathPhoto, story) {
      $('#form-update').attr('action', url);
      $('#wrapper-dropify').html(`
        <input id="photo-edit" type="file" class="dropify-edit" name="photo" data-allowed-file-extensions="jpg jpeg png webp" data-default-file="${pathPhoto}"/>
      `);
      $('#title-edit').val(story.title);
      $('#date-edit').val(story.date);
      $('#description-edit').val(story.description);
      $('.dropify-edit').dropify({
        tpl: {
          message: '<div class="dropify-message"><span class="file-icon" /> <p></p></div>',
        }
      });
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
              Story</a>
          </li>
        </ol>
      </nav>
      <div>
        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modal-add">
          <i class='bx bx-plus align-text-top'></i>
          <span>Add Story</span>
        </button>
      </div>
    </div>
    <div class="row">
      @foreach ($stories as $s)
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <img src="{{ asset('storage/' . $s->photo) }}" class="card-img-top" alt="photo"
              style="height: 250px; object-fit: cover;">
            <div class="card-body">
              <h4 class="card-title fw-bold">{{ $s->title }}</h4>
              <h6 class="card-subtitle text-muted">{{ $s->formatedDate() }}</h6>
              <p class="card-text mt-4">{{ Str::limit($s->description, 200) }}</p>
            </div>
            <div class="card-footer border-top d-flex justify-content-end">
              <button class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#modal-delete"
                onclick="handleDelete('{{ route('master.coupleStory.destroy', $s->id) }}')">
                <i class='align-text-bottom bx bx-trash'></i>
                <span>Delete</span>
              </button>
              <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal-edit"
                onclick="handleEdit('{{ route('master.coupleStory.update', $s->id) }}', '{{ asset('storage/' . $s->photo) }}', {{ $s }})">
                <i class='align-text-bottom bx bxs-edit'></i>
                <span>Edit</span>
              </button>
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
          <h1 class="modal-title fs-5" id="modal-addLabel">Add Couple Story</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('master.coupleStory.store') }}" method="post" id="form-store"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="photo-store" class="form-label">Photo</label>
              <input id="photo-store" type="file" class="dropify" name="photo"
                data-allowed-file-extensions="jpg jpeg png webp" required />
            </div>
            <div class="mb-3">
              <label for="title-store" class="form-label">Title</label>
              <input id="title-store" type="text" class="form-control" name="title" required>
            </div>
            <div class="mb-3">
              <label for="date-store" class="form-label">Date</label>
              <input id="date-store" type="date" class="form-control" name="date" required>
            </div>
            <div class="mb-3">
              <label for="description-store"
                class="form-label @error('description') text-danger @enderror">Description</label>
              <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description-store"
                cols="30" rows="10" required maxlength="207"></textarea>
              @error('description')
                <small class="text-danger">{{ $message }}</small>
              @enderror
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
          <h1 class="modal-title fs-5" id="modal-editLabel">Edit Couple Story</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" id="form-update" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
              <label for="photo-edit" class="form-label">Photo</label>
              <div id="wrapper-dropify"></div>
            </div>
            <div class="mb-3">
              <label for="title-edit" class="form-label">Title</label>
              <input id="title-edit" type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
              <label for="date-edit" class="form-label">Date</label>
              <input id="date-edit" type="date" class="form-control" name="date">
            </div>
            <div class="mb-3">
              <label for="description-edit"
                class="form-label @error('description') text-danger @enderror">Description</label>
              <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description-edit"
                cols="30" rows="10"></textarea>
              @error('description')
                <small class="text-danger">{{ $message }}</small>
              @enderror
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
          <h1 class="modal-title fs-5" id="modal-deleteLabel">Delete Couple Story</h1>
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
