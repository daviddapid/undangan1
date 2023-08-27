<!-- start of hero -->
<section class="static-hero">
  <div class="hero-container">
    <div class="hero-inner">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-xl-8 col-lg-6 col-12">
            <div class="wpo-static-hero-inner">
              <div class="shape-1">
                <img src="guest/assets/images/slider/shape.svg" alt="" />
              </div>
              <div data-swiper-parallax="300" class="slide-title">
                <h2>
                  {{ $couples_bio[0]->name ?? '<name>' }} <span>&</span> {{ $couples_bio[1]->name ?? '<name>' }}
                </h2>
              </div>
              <div data-swiper-parallax="400" class="slide-text">
                <p>
                  We Are Getting Married {{ $ddate }}
                </p>
              </div>
              <div class="wpo-wedding-date">
                <div class="clock-grids">
                  <div id="clock"></div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="static-hero-right">
    <div class="static-hero-img">
      <div class="static-hero-img-inner">
        <img src="{{ asset('storage/' . $cover_photo->photo) }}"
          style="width: 560px;height: 741px; object-fit: contain;" alt="" />
      </div>
      <div class="static-hero-shape-1 floating-item">
        <img src="guest/assets/images/slider/flower1.png" alt="" />
      </div>
      <div class="static-hero-shape-2 floating-item">
        <img src="guest/assets/images/slider/flower2.png" alt="" />
      </div>
    </div>
  </div>
</section>
<!-- end of hero slider -->

@push('script')
  <script>
    // targeted date
    const HARI_H = '{{ $countDownTime }}'
    const countDownDate = new Date(HARI_H)


    $(document).ready(function() {
      setTimeout(() => {
        const [day_elm, hour_elm, minute_elm, second_elm] = document.querySelectorAll('.time')

        setInterval(() => {
          let now = new Date().getTime()
          let distance = countDownDate - now;

          let days = Math.floor(distance / (1000 * 60 * 60 * 24));
          let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          let seconds = Math.floor((distance % (1000 * 60)) / 1000);

          if (distance < 0) {
            return
          }

          day_elm.innerHTML = days
          hour_elm.innerHTML = hours
          minute_elm.innerHTML = minutes
          second_elm.innerHTML = seconds
        }, 1000);

      }, 1000);
    });
  </script>
@endpush
