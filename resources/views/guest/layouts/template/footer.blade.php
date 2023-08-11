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
              Blandit ipsum arcu donec auctor a,
              turpis vitae. Egestas pretium euenim non
              euoeu dignissim nulla nunc quisque
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
                <a href="blog.html">Latest News</a>
              </li>
              <li>
                <a href="accomodation.html">Accomodation</a>
              </li>
              <li>
                <a href="story.html">Our story</a>
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
                  <i class="fi flaticon-email"></i>Mylove@gmail.com
                </li>
                <li>
                  <i class="fi flaticon-phone-call"></i>+888 (123) 869523
                </li>
                <li>
                  <i class="fi flaticon-maps-and-flags"></i>New York – 1075 Firs Avenue
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
          <div class="widget newsletter">
            <div class="widget-title">
              <h3>Newsletter</h3>
            </div>
            <form>
              <input type="text" placeholder="Email" required />
              <button type="submit">Subscribe</button>
            </form>
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
            &copy; 2022 Mylove Template. Design By
            <a href="index-2.html">wpOceans</a>. All
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
<script src="{{  asset('guest/assets/js/jquery.min.js')}}"></script>
<script src="{{  asset('guest/assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- Plugins for this template -->
<script src="{{  asset('guest/assets/js/modernizr.custom.js')}}"></script>
<script src="{{  asset('guest/assets/js/jquery.dlmenu.js')}}"></script>
<script src="{{  asset('guest/assets/js/jquery-plugin-collection.js')}}"></script>
<!-- Moving Animation -->
<script src="{{  asset('guest/assets/js/moving-animation.js')}}"></script>
<!-- Custom script for this template -->
<script src="{{  asset('guest/assets/js/script.js')}}"></script>


<script src="{{  asset('guest/js/backsound.js')}}"></script>

@yield('scripts')

@stack('script')
</body>


</html>
