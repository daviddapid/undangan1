<!-- Start header -->
<header id="header">
  <div class="wpo-site-header wpo-site-header-s1">
    <nav class="navigation navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-lg-3 col-md-3 col-3 d-lg-none dl-block">
            <div class="mobail-menu">
              <button type="button" class="navbar-toggler open-btn">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar first-angle"></span>
                <span class="icon-bar middle-angle"></span>
                <span class="icon-bar last-angle"></span>
              </button>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 col-6">
            <div class="navbar-header">
              <a class="navbar-brand logo" href="index-2.html"><small>My</small>love<span><i
                    class="fi flaticon-dove"></i></span></a>
            </div>
          </div>
          <div class="col-lg-8 col-md-1 col-1">
            <div id="navbar" class="collapse navbar-collapse navigation-holder">
              <button class="menu-close">
                <i class="ti-close"></i>
              </button>
              <ul class="nav navbar-nav mb-2 mb-lg-0">
                <li class="menu-item-has-children">
                  <a href="{{ route('home') }}">Home</a>
                  {{-- <ul class="sub-menu">
                    <li>
                      <a class="active" href="index-2.html">Home Style 1</a>
                    </li>
                    <li>
                      <a href="index-3.html">Home Style 2</a>
                    </li>
                    <li>
                      <a href="index-4.html">Home Style 3</a>
                    </li>
                    <li>
                      <a href="index-5.html">Home Static Hero</a>
                    </li>
                    <li>
                      <a href="index-10.html">Home Box Style</a>
                    </li>
                    <li>
                      <a href="index-6.html">Home Ripple
                        Effect</a>
                    </li>
                    <li>
                      <a href="index-7.html">Home Sprite
                        Effect</a>
                    </li>
                    <li>
                      <a href="index-8.html">Home particles
                        Effect</a>
                    </li>
                    <li>
                      <a href="index-9.html">Home Video Banar</a>
                    </li>
                    <li>
                      <a href="index-11.html">Invitation</a>
                    </li>
                  </ul> --}}
                </li>
                <li>
                  <a href="#couple">Couple</a>
                </li>
                <li>
                  <a href="#story">Story</a>
                </li>
                <li>
                  <a href="#gallery">Gallery</a>
                </li>
                <li>
                  <a href="#RSVP">RSVP</a>
                </li>
                <li>
                  <a href="#event">Events</a>
                </li>
                <li class="menu-item-has-children">
                  <a href="#">Blog</a>
                  <ul class="sub-menu">
                    <li>
                      <a href="blog.html">Blog right
                        sidebar</a>
                    </li>
                    <li>
                      <a href="blog-left-sidebar.html">Blog left
                        sidebar</a>
                    </li>
                    <li>
                      <a href="blog-fullwidth.html">Blog fullwidth</a>
                    </li>
                    <li class="menu-item-has-children">
                      <a href="#">Blog details</a>
                      <ul class="sub-menu">
                        <li>
                          <a href="blog-single.html">Blog
                            details
                            right
                            sidebar</a>
                        </li>
                        <li>
                          <a href="blog-single-left-sidebar.html">Blog
                            details left
                            sidebar</a>
                        </li>
                        <li>
                          <a href="blog-single-fullwidth.html">Blog
                            details
                            fullwidth</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <!-- end of nav-collapse -->
          </div>
          <div class="col-lg-2 col-md-2 col-2">
            <div class="header-right">
              @auth
                @php
                  $u = Auth::user();
                @endphp
                @if ($u->role == 'guest')
                  <a class="theme-btn" href="{{ route('my-qr') }}"><span class="text">Check My QR</span>
                    <span class="mobile">
                      <i class="fi flaticon-user"></i> </span>
                  </a>
                @else
                  <a class="theme-btn" href="#RSVP"><span class="text">Attend Now</span>
                    <span class="mobile">
                      <i class="fi flaticon-user"></i> </span>
                  </a>
                @endif
              @endauth

              @guest
                <a class="theme-btn" href="#RSVP"><span class="text">Attend Now</span>
                  <span class="mobile">
                    <i class="fi flaticon-user"></i> </span>
                </a>
              @endguest

            </div>
          </div>
        </div>
      </div>
      <!-- end of container -->
    </nav>
  </div>
</header>
<!-- end of header -->
