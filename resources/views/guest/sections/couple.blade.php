<!-- start couple-section -->
<section class="couple-section section-padding" id="couple">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col col-lg-11">
        <div class="couple-area clearfix">
          {{-- @dd($couples_bio) --}}
          @if ($couples_bio->count() == 2)
            <div class="couple-item bride">
              <div class="row align-items-center">
                <div class="col-lg-4">
                  <div class="couple-img">
                    <img src="guest/assets/images/couple/2.jpg" alt="" />
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="couple-text">
                    <h3>{{ $couples_bio[0]->name }}</h3>
                    <p>
                      {{ $couples_bio[0]->description }}
                    </p>
                    <div class="social">
                      <ul>
                        @if ($couples_bio[0]->instagram != null)
                          <li>
                            <a href="{{ $couples_bio[0]->instagram }}"><i class="ti-instagram"></i></a>
                          </li>
                        @endif
                        @if ($couples_bio[0]->facebook != null)
                          <li>
                            <a href="{{ $couples_bio[0]->facebook }}"><i class="ti-facebook"></i></a>
                          </li>
                        @endif
                        @if ($couples_bio[0]->twitter != null)
                          <li>
                            <a href="{{ $couples_bio[0]->twitter }}"><i class="ti-twitter-alt"></i></a>
                          </li>
                        @endif
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="couple-item groom">
              <div class="row align-items-center">
                <div class="col-lg-7 order-lg-1 order-2">
                  <div class="couple-text">
                    <h3>{{ $couples_bio[1]->name }}</h3>
                    <p>
                      {{ $couples_bio[1]->description }}
                    </p>
                    <div class="social">
                      <ul>
                        @if ($couples_bio[1]->instagram != null)
                          <li>
                            <a href="{{ $couples_bio[1]->instagram }}"><i class="ti-instagram"></i></a>
                          </li>
                        @endif
                        @if ($couples_bio[1]->facebook != null)
                          <li>
                            <a href="{{ $couples_bio[1]->facebook }}"><i class="ti-facebook"></i></a>
                          </li>
                        @endif
                        @if ($couples_bio[1]->twitter != null)
                          <li>
                            <a href="{{ $couples_bio[1]->twitter }}"><i class="ti-twitter-alt"></i></a>
                          </li>
                        @endif
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 order-lg-2 order-1">
                  <div class="couple-img">
                    <img src="guest/assets/images/couple/3.jpg" alt="" />
                  </div>
                </div>
              </div>
            </div>
          @else
            <h1 class="text-center bg-secondary text-white border-rounded p-3">Bio Pengantin Belum Di Set</h1>
          @endif
        </div>
      </div>
    </div>
  </div>
  <!-- end container -->
  <div class="shape-1">
    <img src="guest/assets/images/couple/shape-1.png" alt="" />
  </div>
  <div class="shape-2">
    <img src="guest/assets/images/couple/shape-2.png" alt="" />
  </div>
</section>
<!-- end couple-section -->
