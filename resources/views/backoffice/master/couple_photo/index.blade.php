@extends('backoffice.layouts.app')
@section('nav-couple-photos', 'active')
@section('style')
  <link rel="stylesheet" href="{{ asset('backoffice/plugins/dropify-master/dist/css/dropify.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backoffice/assets/css/couplePhotos.css') }}">
@endsection
@section('script')
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
    integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
  </script>

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
    function handleEdit(url, pathPhoto) {
      $('#form-edit').attr('action', url);
      // $('#photo-edit').data('default-file', pathPhoto);

      $('.dropify-edit').dropify({
        tpl: {
          message: '<div class="dropify-message"><span class="file-icon" /> <p></p></div>',
        }
      });
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
              Photo</a>
          </li>
        </ol>
      </nav>
    </div>
    <div class="row" data-masonry='{"percentPosition": true }'>
      @foreach ($photos as $index => $p)
        @if ($p->type == 'potrait')
          <div class="col-lg-4 mb-3 px-2">
            <div class="img-fluid wrapper-potrait">
              @if ($p->photo != null)
                <img class="img-fluid img-potrait" src="{{ asset('storage/' . $p->photo) }}" alt="">
                <div class="mask-edit" data-bs-toggle="modal" data-bs-target="#modal-edit"
                  onclick="handleEdit('{{ route('master.couplePhotos.update', $p->id) }}', '{{ asset('storage/' . $p->photo) }}')">
                  <i class='bx bxs-edit'></i>
                </div>
              @else
                <div class="empty-img" data-bs-toggle="modal" data-bs-target="#modal-edit"
                  onclick="handleEdit('{{ route('master.couplePhotos.update', $p->id) }}', '{{ asset('storage/' . $p->photo) }}')">
                  <i class='bx bxs-edit'></i>
                </div>
              @endif
            </div>
          </div>
        @elseif($p->type == 'square')
          <div class="col-lg-4 mb-3 px-2">
            <div style="" class="img-fluid wrapper-square">
              @if ($p->photo != null)
                <img class="img-fluid img-square" src="{{ asset('storage/' . $p->photo) }}" alt="">
                <div class="mask-edit" data-bs-toggle="modal" data-bs-target="#modal-edit"
                  onclick="handleEdit('{{ route('master.couplePhotos.update', $p->id) }}', '{{ asset('storage/' . $p->photo) }}')">
                  <i class='bx bxs-edit'></i>
                </div>
              @else
                <div class="empty-img" data-bs-toggle="modal" data-bs-target="#modal-edit"
                  onclick="handleEdit('{{ route('master.couplePhotos.update', $p->id) }}', '{{ asset('storage/' . $p->photo) }}')">
                  <i class='bx bxs-edit'></i>
                </div>
              @endif
            </div>
          </div>
        @endif
      @endforeach
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
          <form method="post" id="form-edit" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div>
              <input id="photo-edit" type="file" class="dropify-edit" name="photo"
                data-allowed-file-extensions="jpg jpeg png webp" required />
            </div>
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
