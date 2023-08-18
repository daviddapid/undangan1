@push('script')
  @if (session('success-attend'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Terima Kasih Telah Bersedia Hadir🙏',
        text: "{{ session('success-attend') }}",
        footer: "<a href='{{ route('my-qr') }}'>Atau klik disini</a>"
      })
    </script>
  @elseif(session('success-absent'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Sedih Banget Kamu Tidak Bisa Hadir☹️',
        text: "{{ session('success-absent') }}",
      })
    </script>
  @endif
@endpush

<!-- start of wpo-contact-section -->
<section class="wpo-contact-section section-padding" id="RSVP">
  <div class="container">
    <div class="wpo-contact-section-wrapper">
      <div class="wpo-contact-form-area">
        <div class="wpo-section-title">
          <div class="section-title-icon">
            <i class="fi flaticon-dove"></i>
          </div>
          <h2>Your Detail</h2>
        </div>

        @if ($user != null && $user->role == 'guest')
          <form method="post" action="{{ route('rsvp.update', Auth::user()->id) }}" class="contact-validation-active">
            @csrf
            @method('put')
            <div>
              <input type="text" class="form-control" name="name" id="name" placeholder="Name" required
                value="{{ $user->name }}" />
            </div>
            <div>
              <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number"
                required value="{{ $user->guest->phone }}" />
            </div>
            <div>
              <input type="number" name="number_of_person" placeholder="Jumlah tamu yang hadir" class="form-control"
                value="{{ $user->guest->number_of_person }}">
            </div>
            <div class="radio-buttons">
              <p>
                <input type="radio" id="status-attend" name="status" checked value="attend"
                  @checked($user->guest->status == 'attend') />
                <label for="status-attend">Iya, saya hadir</label>
              </p>
              <p>
                <input type="radio" id="status-absent" name="status" value="absent" @checked($user->guest->status == 'absent') />
                <label for="status-absent">Maaf, saya tidak hadir</label>
              </p>
            </div>

            <div class="submit-area">
              <button type="submit" @disabled($user->guest->is_present) class="theme-btn-s3">
                Perbarui RSVP
              </button>
              <div id="c-loader">
                <i class="ti-reload"></i>
              </div>
            </div>
            <div class="clearfix error-handling-messages">
              <div id="success">Thank you</div>
              <div id="error">
                Error occurred while sending email.
                Please try again later.
              </div>
            </div>
          </form>
        @elseif($user != null && ($user->role == 'admin' || $user->role == 'superadmin'))
          <form method="post" action="{{ route('rsvp.update', Auth::user()->id) }}" class="contact-validation-active">
            @csrf
            @method('put')
            <div>
              <input type="text" class="form-control" name="name" id="name" placeholder="Name" required />
            </div>
            <div>
              <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number"
                required />
            </div>
            <div>
              <input type="number" name="number_of_person" placeholder="Jumlah tamu yang hadir" class="form-control">
            </div>
            <div class="radio-buttons">
              <p>
                <input type="radio" id="status-attend" name="status" />
                <label for="status-attend">Iya, saya hadir</label>
              </p>
              <p>
                <input type="radio" id="status-absent" name="status" />
                <label for="status-absent">Maaf, saya tidak hadir</label>
              </p>
            </div>

            <div class="submit-area">
              <button type="submit" class="theme-btn-s3" disabled>
                Perbarui RSVP
              </button>
              <div id="c-loader">
                <i class="ti-reload"></i>
              </div>
            </div>
            <div class="clearfix error-handling-messages">
              <div id="success">Thank you</div>
              <div id="error">
                Error occurred while sending email.
                Please try again later.
              </div>
            </div>
          </form>
        @endif

        @guest
          <form method="post" action="{{ route('rsvp.store') }}" class="contact-validation-active">
            @csrf
            <div>
              <input type="text" class="form-control" name="name" id="name" placeholder="Name" required />
            </div>
            <div>
              <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number"
                required />
            </div>
            <div>
              <input type="number" name="number_of_person" placeholder="Jumlah tamu yang hadir" class="form-control">
            </div>
            <div class="radio-buttons">
              <p>
                <input type="radio" id="status-attend" name="status" checked value="attend" />
                <label for="status-attend">Iya, saya hadir</label>
              </p>
              <p>
                <input type="radio" id="status-absent" name="status" value="absent" />
                <label for="status-absent">Maaf, saya tidak hadir</label>
              </p>
            </div>

            <div class="submit-area">
              <button type="submit" class="theme-btn-s3">
                Send An Inquiry
              </button>
              <div id="c-loader">
                <i class="ti-reload"></i>
              </div>
            </div>
            <div class="clearfix error-handling-messages">
              <div id="success">Thank you</div>
              <div id="error">
                Error occurred while sending email.
                Please try again later.
              </div>
            </div>
          </form>
        @endguest

        <div class="border-style"></div>
      </div>
      <div class="vector-1">
        <img src="guest/assets/images/rsvp/flower1.png" alt="" />
      </div>
      <div class="vector-2">
        <img src="guest/assets/images/rsvp/flower2.png" alt="" />
      </div>
    </div>
  </div>
  <div class="shape-1">
    <img src="guest/assets/images/rsvp/shape1.png" alt="" />
  </div>
  <div class="shape-2">
    <img src="guest/assets/images/rsvp/shape2.png" alt="" />
  </div>
</section>
<!-- end of wpo-contact-section -->
