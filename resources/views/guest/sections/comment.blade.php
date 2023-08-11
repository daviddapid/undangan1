@section('head')
  <style>
    .slick-list {
      padding: 50px;
    }

    .card-comment {
      margin-inline: 5px;
      width: 350px;
    }

    @media (max-width: 425px) {
      .card-comment {
        width: 70vw
      }
    }
  </style>
@endsection

<!-- start comments-section -->
<section class="wpo-blog-section section-padding" id="blog">
  <div class="container">
    <div class="row">
      <div class="wpo-section-title">
        <div class="section-title-icon">
          <i class="fi flaticon-dove"></i>
        </div>
        <h2>Comments</h2>
      </div>
    </div>
    <div class="autoplay" style="padding: 30px">

      <div class="card shadow card-comment">
        <div class="card-body p-4">
          <p>
            "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia repellendus iusto a
            repellat in magni impedit possimus iure dolorum ex?"
          </p>
          <span class="comment-author fw-bold ms-100 mt-4" style="display: flex; justify-content: end">Budi
            Buda</span>
        </div>
      </div>


      <div class="card shadow card-comment">
        <div class="card-body p-4">
          <p>
            "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia repellendus iusto a
            repellat in magni impedit possimus iure dolorum ex?"
          </p>
          <span class="comment-author fw-bold ms-100 mt-4" style="display: flex; justify-content: end">Budi
            Buda</span>
        </div>
      </div>


      <div class="card shadow card-comment">
        <div class="card-body p-4">
          <p>
            "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia repellendus iusto a
            repellat in magni impedit possimus iure dolorum ex?"
          </p>
          <span class="comment-author fw-bold ms-100 mt-4" style="display: flex; justify-content: end">Budi
            Buda</span>
        </div>
      </div>


      <div class="card shadow card-comment">
        <div class="card-body p-4">
          <p>
            "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia repellendus iusto a
            repellat in magni impedit possimus iure dolorum ex?"
          </p>
          <span class="comment-author fw-bold ms-100 mt-4" style="display: flex; justify-content: end">Budi
            Buda</span>
        </div>
      </div>


      <div class="card shadow card-comment">
        <div class="card-body p-4">
          <p>
            "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia repellendus iusto a
            repellat in magni impedit possimus iure dolorum ex?"
          </p>
          <span class="comment-author fw-bold ms-100 mt-4" style="display: flex; justify-content: end">Budi
            Buda</span>
        </div>
      </div>


    </div>

  </div>
  <!-- end container -->
</section>
<!-- end wpo-blog-section -->

@section('scripts')
  <script>
    $(document).ready(function() {
      $('.autoplay').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1,
        speed: 5000,
        cssEase: 'linear',
        variableWidth: true,
        arrows: false
      });
    });
  </script>
@endsection
