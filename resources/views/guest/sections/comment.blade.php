@section('head')
  <link rel="stylesheet" href="{{ asset('guest/assets/section-css/comment-section.css') }}">
@endsection

<!-- start comments-section -->
<section class="wpo-blog-section section-padding" id="comments">
  <div class="container">
    <div class="row">
      <div class="wpo-section-title">
        <div class="section-title-icon">
          <i class="fi flaticon-dove"></i>
        </div>
        <h2>Comments</h2>
      </div>
    </div>
  </div>
  <div class="autoplay comments-wrapper">
    @foreach ($comments as $c)
      <div class="card shadow card-comment">
        <div class="card-body p-4">
          <p>
            "{{ $c->message }}"
          </p>
          <div class="comment-author fw-bold ms-100 mt-4" style="display: flex; justify-content: end">
            <img src="{{ asset('guest/assets/icons/petals.png') }}" alt="">
            <span>{{ $c->name }}</span>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <!-- end container -->
</section>
<!-- end wpo-blog-section -->
<!-- start of wpo-contact-section -->
<section class="wpo-contact-section section-padding" id="RSVP">
  <div class="container">
    <div class="wpo-contact-section-wrapper">
      <div class="wpo-contact-form-area">
        <div class="wpo-section-title">
          <div class="section-title-icon">
            <i class="fi flaticon-dove"></i>
          </div>
          <h2>Tulis Kartu Ucapan</h2>
        </div>

        <form method="post" action="{{ route('send-comment') }}" class="contact-validation-active">
          @csrf
          <input placeholder="Name" type="text" class="form-control mb-3" name="name" required maxlength="28">
          <textarea name="message" placeholder="Message" class="form-control" id="" cols="30" rows="10"
            style="height: 100px" required maxlength="159"></textarea>
          <div class="submit-area">
            <button type="submit" class="theme-btn-s3">
              Kirim kartu ucapan
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

@push('script')
  <script>
    $(document).ready(function() {
      $('.autoplay').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 0,
        speed: 5000,
        cssEase: 'linear',
        variableWidth: true,
        arrows: false,
        touchThreshold: 100,
      });
    });
  </script>
@endpush
