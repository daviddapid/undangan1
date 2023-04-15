<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Login Basic - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('backoffice/assets/img/favicon/favicon.ico') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="{{ asset('backoffice/assets/vendor/fonts/boxicons.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('backoffice/assets/vendor/css/core.css') }}"
    class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('backoffice/assets/vendor/css/theme-default.css') }}"
    class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('backoffice/assets/css/demo.css') }}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="{{ asset('backoffice/assets/vendor/css/pages/page-auth.css') }}" />
  <!-- Helpers -->
  <script src="{{ asset('backoffice/assets/vendor/js/helpers.js') }}"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{ asset('backoffice/assets/js/config.js') }}"></script>

  {{-- override sweet alert --}}
  <style>
    .swal2-popup {
      border-radius: 39px !important;
    }

    .swal2-actions {
      width: 55% !important;
    }

    .swal2-styled.swal2-confirm {
      width: 100% !important;
      background-color: #696cff !important;
      border-radius: 39px !important;
    }
  </style>
</head>

<body>
  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        @yield('content')
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->


  <!-- Core JS -->
  <!-- build:js 'backoffice/assets/vendor/js/core.js -->
  <script src="{{ asset('backoffice/assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('backoffice/assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('backoffice/assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

  <script src="{{ asset('backoffice/assets/vendor/js/menu.js') }}"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Main JS -->
  <script src="{{ asset('backoffice/assets/js/main.js') }}"></script>

  <!-- Page JS -->
  @yield('script')
  <!-- Place this tag in your head or just before your close body tag. -->
  {{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
</body>

</html>
