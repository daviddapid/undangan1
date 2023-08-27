@push('style')
  <link rel="stylesheet" href="{{ asset('guest/assets/css/portfolio-section.css') }}">
@endpush
@push('script')
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
    integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
  </script>
@endpush
<!-- start wpo-portfolio-section -->
<section class="wpo-portfolio-section section-padding" id="gallery">
  <div class="container">
    <div class="row">
      <div class="wpo-section-title">
        <div class="section-title-icon">
          <i class="fi flaticon-dove"></i>
        </div>
        <h2>Sweet Captured Moments</h2>
      </div>
    </div>
    <div class="sortable-gallery">
      <div class="gallery-filters"></div>
      <div class="row">
        <div class="col-lg-12">
          <div class="portfolio-grids gallery-container clearfix">
            <div class="grid">
              <div class="img-holder">
                <a href="{{ asset('storage/' . $photos[0]->photo) }}" class="fancybox" data-fancybox-group="gall-1">
                  <img src="{{ asset('storage/' . $photos[0]->photo) }}" alt class="img img-responsive img-potrait" />
                  <div class="hover-content">
                    <i class="ti-plus"></i>
                  </div>
                </a>
              </div>
            </div>
            <div class="grid">
              <div class="img-holder">
                <a href="{{ asset('storage/' . $photos[1]->photo) }}" class="fancybox" data-fancybox-group="gall-1">
                  <img src="{{ asset('storage/' . $photos[1]->photo) }}" alt class="img img-responsive img-square" />
                  <div class="hover-content">
                    <i class="ti-plus"></i>
                  </div>
                </a>
              </div>
            </div>
            <div class="grid">
              <div class="img-holder">
                <a href="{{ asset('storage/' . $photos[2]->photo) }}" class="fancybox" data-fancybox-group="gall-1">
                  <img src="{{ asset('storage/' . $photos[2]->photo) }}" alt class="img img-responsive img-potrait" />
                  <div class="hover-content">
                    <i class="ti-plus"></i>
                  </div>
                </a>
              </div>
            </div>
            <div class="grid">
              <div class="img-holder">
                <a href="{{ asset('storage/' . $photos[3]->photo) }}" class="fancybox" data-fancybox-group="gall-1">
                  <img src="{{ asset('storage/' . $photos[3]->photo) }}" alt class="img img-responsive img-potrait" />
                  <div class="hover-content">
                    <i class="ti-plus"></i>
                  </div>
                </a>
              </div>
            </div>
            <div class="grid">
              <div class="img-holder">
                <a href="{{ asset('storage/' . $photos[4]->photo) }}" class="fancybox" data-fancybox-group="gall-1">
                  <img src="{{ asset('storage/' . $photos[4]->photo) }}" alt class="img img-responsive img-square" />
                  <div class="hover-content">
                    <i class="ti-plus"></i>
                  </div>
                </a>
              </div>
            </div>
            <div class="grid">
              <div class="img-holder">
                <a href="{{ asset('storage/' . $photos[5]->photo) }}" class="fancybox" data-fancybox-group="gall-1">
                  <img src="{{ asset('storage/' . $photos[5]->photo) }}" alt class="img img-responsive img-square" />
                  <div class="hover-content">
                    <i class="ti-plus"></i>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end container -->
</section>
<!-- end wpo-portfolio-section -->
