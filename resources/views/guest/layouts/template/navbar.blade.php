<!-- Start header -->
<header id="header">
  <div class="wpo-site-header wpo-site-header-s1" style="z-index: 999;">
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
              <a class="navbar-brand logo" href="{{ route('home') }}"><small>Undangan</small>Ku<span><i
                    class="fi flaticon-dove"></i></span></a>
            </div>
          </div>
          <div class="col-lg-8 col-md-1 col-1">
            <div id="navbar" class="collapse navbar-collapse navigation-holder">
              <button class="menu-close">
                <i class="ti-close"></i>
              </button>
              <ul class="nav navbar-nav mb-2 mb-lg-0">
                <li>
                  <a href="{{ route('home') }}">Home</a>
                </li>
                <li>
                  <a href="{{ route('home') . '#couple' }}">Couple</a>
                </li>
                <li>
                  <a href="{{ route('home') . '#story' }}">Story</a>
                </li>
                <li>
                  <a href="{{ route('home') . '#gallery' }}">Gallery</a>
                </li>
                <li>
                  <a href="{{ route('home') . '#RSVP' }}">RSVP</a>
                </li>
                <li>
                  <a href="{{ route('home') . '#event' }}">Events</a>
                </li>
                <li>
                  <a href="{{ route('home') . '#comments' }}">Comments</a>
                </li>
              </ul>
            </div>
            <!-- end of nav-collapse -->
          </div>
          <div class="col-lg-2 col-md-2 col-2">
            <div class="header-right">

              @php
                $u = Auth::user();
              @endphp
              @if ($u->role == 'guest' && $u->guest->status == 'attend')
                <a class="theme-btn" href="{{ route('my-qr') }}"><span class="text">Check My QR</span>
                  <span class="mobile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-qr-code" viewBox="0 0 16 16">
                      <path d="M2 2h2v2H2V2Z" />
                      <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z" />
                      <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z" />
                      <path
                        d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z" />
                      <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z" />
                    </svg>
                </a>
              @elseif($u->role == 'guest' && $u->guest->status == 'absent')
                <a class="theme-btn" href="#RSVP"><span class="text">Update RSVP</span>
                  <span class="mobile">
                    <i class="fi flaticon-user"></i> </span>
                </a>
              @else
                <a class="theme-btn" href="{{ route('dashboard') }}"><span class="text">Go to Dashboard</span>
                  <span class="mobile">
                    <i class="fi flaticon-user"></i> </span>
                </a>
              @endif

              @guest
                <a class="theme-btn" href="#RSVP"><span class="text">Attend Now</span>
                  <span class="mobile">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                      viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                      <style>
                        svg {
                          fill: #ffffff
                        }
                      </style>
                      <path
                        d="M352 96l64 0c17.7 0 32 14.3 32 32l0 256c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l64 0c53 0 96-43 96-96l0-256c0-53-43-96-96-96l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm-9.4 182.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L242.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z" />
                    </svg>
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
