<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>

    <div id="app">
        @include('layouts.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
        
            <div class="page-content">
                <div class="page-heading">
                    @yield('container')
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>


    {{-- <div id="app">
        @include('layouts.sidebar')
        <div id="main">
            <header class='mb-3'>
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div id="main-content">
                @yield('container')
                <div class="page-heading">
                </div>
            </div>
        </div>
    </div>  --}}

<script src="{{ asset('mazer/assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('mazer/assets/js/app.js') }}"></script>

{{-- DataTable --}}
<script src="{{ asset('mazer/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('mazer/assets/js/pages/simple-datatables.js') }}"></script>

{{-- Font awesome --}}
<link rel="stylesheet" href="{{ asset('mazer/assets/extensions/@fortawesome/fontawesome-free/css/all.min.css') }}">
    
<!-- Need: Apexcharts -->
{{-- <script src="{{ asset('mazer/assets/extensions/apexcharts/apexcharts.min.js') }}"></script> --}}
<script src="{{ asset('mazer/assets/js/pages/dashboard.js') }}"></script>

{{-- Select --}}
{{-- <script src="{{ asset('mazer/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script> --}}
{{-- <script src="{{ asset('mazer/assets/js/pages/form-element-select.js') }}"></script> --}}

{{-- ChartJS --}}
{{-- <script src="{{ asset('mazer/assets/extensions/chart.js/Chart.min.js') }}"></script> --}}
{{-- <script src="{{ asset('mazer/assets/js/pages/ui-chartjs.js') }}"></script> --}}

</body>

</html>
