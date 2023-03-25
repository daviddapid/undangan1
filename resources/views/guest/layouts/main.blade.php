@include('guest.layouts.template.head')
<!-- start page-wrapper -->
<div class="page-wrapper">
  @include('guest.layouts.template.preloader')
  @include('guest.layouts.template.navbar')
  @yield('content')
</div>
<!-- end of page-wrapper -->
@include('guest.layouts.template.footer')
