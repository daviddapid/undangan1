<!-- Core JS -->
<!-- build:js admin/assets/vendor/js/core.js -->
<script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>

<!-- Main JS -->
<script src="{{ asset('admin/assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('admin/assets/js/dashboards-analytics.js') }}"></script>
@yield('script')

<!-- Place this tag in your head or just before your close body tag. -->
{{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
</body>

</html>
