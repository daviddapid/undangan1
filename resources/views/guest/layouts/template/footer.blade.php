<!-- start of wpo-site-footer-section -->
<footer class="wpo-site-footer">
  <div class="wpo-upper-footer">
    <div class="container">
      <div class="row">
        <div class="col col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
          <div class="widget about-widget">
            <div class="widget-title">
              <a class="logo" href="index-2.html"><small>My</small>love<span><i class="fi flaticon-dove"></i></span></a>
            </div>
            <p>
              Undang Keluarga, Kerabat, dan teman-temanmu dengan mudah menggunakan Aplikasi <b>UndanganKu</b>
            </p>
            <ul>
              <li>
                <a href="#">
                  <i class="ti-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="ti-twitter-alt"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="ti-instagram"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="ti-google"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
          <div class="widget link-widget">
            <div class="widget-title">
              <h3>Information</h3>
            </div>
            <ul>
              <li>
                <a href="about.html">About Us</a>
              </li>
              <li>
                <a href="blog.html">Pricing</a>
              </li>
              <li>
                <a href="blog.html">Contact</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
          <div class="widget wpo-service-link-widget">
            <div class="widget-title">
              <h3>Contact Us</h3>
            </div>
            <div class="contact-ft">
              <ul>
                <li>
                  <i class="fi flaticon-email"></i>undanganku@gmail.com
                </li>
                <li>
                  <i class="fi flaticon-phone-call"></i>+62 08813573777
                </li>
                <li>
                  <i class="fi flaticon-maps-and-flags"></i>Jl. Smea No.4, Kec. Wonokromo, Surabaya, Jawa
                  Timur
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
          <div class="widget newsletter">
            <div class="widget-title">
              <h3>Our Location</h3>
            </div>
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d794.6686388306916!2d112.72448604590801!3d-7.351391545240344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e5ef62fbc74d%3A0xc850d71c0bfc7b60!2sTerminal%20Bungurasih!5e0!3m2!1sid!2sid!4v1692081883085!5m2!1sid!2sid"
              height="300" style="border:0;width: 100%;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
    <!-- end container -->
  </div>
  <div class="wpo-lower-footer">
    <div class="container">
      <div class="row">
        <div class="col col-xs-12">
          <p class="copyright">
            &copy; 2023 UndanganKu. Design By
            <a href="index-2.html">Kelompok 2</a>. All
            Rights Reserved.
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- end of wpo-site-footer-section -->

<!-- All JavaScript files
    ================================================== -->
<script src="{{ asset('guest/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('guest/assets/js/bootstrap.bundle.min.js') }}"></script>
<!-- Plugins for this template -->
<script src="{{ asset('guest/assets/js/modernizr.custom.js') }}"></script>
<script src="{{ asset('guest/assets/js/jquery.dlmenu.js') }}"></script>
<script src="{{ asset('guest/assets/js/jquery-plugin-collection.js') }}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- Moving Animation -->
<script src="{{ asset('guest/assets/js/moving-animation.js') }}"></script>
<!-- Custom script for this template -->
<script src="{{ asset('guest/assets/js/script.js') }}"></script>

<script src="{{ asset('guest/js/backsound.js') }}"></script>
<script src="{{ asset('guest/assets/js/my-clock.js') }}"></script>

@yield('scripts')

@stack('script')
</body>


</html>
