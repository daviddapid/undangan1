@extends('backoffice.layouts.app')
@section('nav-couple-bio', 'active')
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

    function handleEdit(url, pathPhoto, bio) {
      $('#form-update').attr('action', url);
      $('#wrapper-dropify').html(`
        <input id="photo-edit" type="file" class="dropify-edit" name="photo" data-allowed-file-extensions="jpg jpeg png webp" data-default-file="${pathPhoto}"/>
      `);
      $('#name-edit').val(bio.name);
      $('#instagram-edit').val(bio.instagram);
      $('#facebook-edit').val(bio.facebook);
      $('#twitter-edit').val(bio.twitter);
      $('#description-edit').val(bio.description);
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
              Bio</a>
          </li>
        </ol>
      </nav>
      <div>
        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modal-add">
          <i class='bx bx-plus align-text-top'></i>
          <span>Add Bio</span>
        </button>
      </div>
    </div>
    <div class="row">
      @foreach ($couple_bios as $b)
        <div class="col-lg-6 mb-4">
          <div class="card h-100">
            <img src="{{ asset('storage/' . $b->photo) }}" class="card-img-top" alt="photo"
              style="height: 250px; object-fit: cover;">
            <div class="card-body px-0">
              <table class="table">
                <tr>
                  <td style="width: 19px" class="fw-bold">Name</td>
                  <td style="width: 9px" class="px-0">:</td>
                  <td>{{ $b->name }}</td>
                </tr>
                <tr>
                  <td style="width: 19px" class="fw-bold">Instagram</td>
                  <td class="px-0">:</td>
                  <td>{{ $b->instagram }}</td>
                </tr>
                <tr>
                  <td style="width: 19px" class="fw-bold">Facebook</td>
                  <td class="px-0">:</td>
                  <td>{{ $b->facebook }}</td>
                </tr>
                <tr>
                  <td style="width: 19px" class="fw-bold">Twitter</td>
                  <td class="px-0">:</td>
                  <td>{{ $b->twitter }}</td>
                </tr>
              </table>
              <div class="px-4">
                <p class="mb-2 mt-4 fw-bold">Description</p>
                <p>{{ $b->description }}</p>
              </div>
            </div>
            <div class="card-footer border-top d-flex justify-content-end">
              <button class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#modal-delete"
                onclick="handleDelete('{{ route('master.coupleBio.destroy', $b->id) }}')">
                <i class='align-text-bottom bx bx-trash'></i>
                <span>Delete</span>
              </button>
              <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal-edit"
                onclick="handleEdit('{{ route('master.coupleBio.update', $b->id) }}', '{{ asset('storage/' . $b->photo) }}', {{ $b }})">
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
          <h1 class="modal-title fs-5" id="modal-addLabel">Add Couple Bio</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('master.coupleBio.store') }}" method="post" id="form-store"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="photo-store" class="form-label">Photo</label>
              <input id="photo-store" type="file" class="dropify" name="photo"
                data-allowed-file-extensions="jpg jpeg png webp" required />
            </div>
            <div class="mb-3">
              <label for="title-store" class="form-label">Name</label>
              <input id="title-store" type="text" class="form-control" name="name" required>
            </div>
            <div class="row">
              <label for="" class="form-label">Social Media <span class="text-muted">(optional)</span></label>
              <div class="col-lg-4">
                <div class="mb-3">
                  {{-- <label for="instagram-store" class="form-label">Instagram</label> --}}
                  <input id="instagram-store" type="text" class="form-control" name="instagram"
                    placeholder="instagram">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-3">
                  {{-- <label for="facebook-store" class="form-label">Facebook</label> --}}
                  <input id="facebook-store" type="text" class="form-control" name="facebook" placeholder="facebook">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-3">
                  {{-- <label for="twitter-store" class="form-label">Twitter</label> --}}
                  <input id="twitter-store" type="text" class="form-control" name="twitter" placeholder="twitter">
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="description-store"
                class="form-label @error('description') text-danger @enderror">Description</label>
              <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description-store"
                cols="30" rows="10" required maxlength="219"></textarea>
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
              <label for="name-edit" class="form-label">Name</label>
              <input id="name-edit" type="text" class="form-control" name="name" required>
            </div>
            <div class="row">
              <label for="" class="form-label">Social Media <span class="text-muted">(optional)</span></label>
              <div class="col-lg-4">
                <div class="mb-3">
                  {{-- <label for="instagram-edit" class="form-label">Instagram</label> --}}
                  <input id="instagram-edit" type="text" class="form-control" name="instagram"
                    placeholder="instagram">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-3">
                  {{-- <label for="facebook-edit" class="form-label">Facebook</label> --}}
                  <input id="facebook-edit" type="text" class="form-control" name="facebook"
                    placeholder="facebook">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-3">
                  {{-- <label for="twitter-edit" class="form-label">Twitter</label> --}}
                  <input id="twitter-edit" type="text" class="form-control" name="twitter" placeholder="twitter">
                </div>
              </div>
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
          <h1 class="modal-title fs-5" id="modal-deleteLabel">Delete Couple Bio</h1>
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
