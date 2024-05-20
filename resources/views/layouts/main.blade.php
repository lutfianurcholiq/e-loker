@include('layouts.header')

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <!-- Menu -->
        @include('layouts.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          @include('layouts.navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              @yield('container')
            </div>
            <!-- / Content -->

            {{-- Footer --}}
            @include('layouts.footer')
            {{-- End Footer --}}

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('template/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('template/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('template/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('template/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    {{-- <script src="{{asset('template/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script> --}}
    
    {{-- Select2 Bootstrap 5 --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Datatables --}}
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> 
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script> 
    <script src="{{ asset('template/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('template/assets/js/main.js')}}"></script>


    <!-- Page JS -->
    <script src="{{asset('template/assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
