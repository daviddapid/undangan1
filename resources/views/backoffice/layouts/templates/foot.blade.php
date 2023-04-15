<!-- Core JS -->
<!-- build:js backoffice/assets/vendor/js/core.js -->
<script src="{{ asset('backoffice/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('backoffice/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('backoffice/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('backoffice/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('backoffice/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
<script src="{{ asset('backoffice/plugins/html5-qrcode.min.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('backoffice/assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('backoffice/assets/js/dashboards-analytics.js') }}"></script>
@yield('script')

<!-- Place this tag in your head or just before your close body tag. -->
{{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
</body>

</html>
