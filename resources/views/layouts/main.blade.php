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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- select2 --}}
<script src="{{ asset('assets/image/js/main.js') }}"></script>

<script src="{{ asset('mazer/assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('mazer/assets/js/app.js') }}"></script>

{{-- DataTable --}}
<script src="{{ asset('mazer/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('mazer/assets/js/pages/simple-datatables.js') }}"></script>

{{-- Font awesome --}}
<link rel="stylesheet" href="{{ asset('mazer/assets/extensions/@fortawesome/fontawesome-free/css/all.min.css') }}">

<script src="{{ asset('mazer/assets/js/pages/dashboard.js') }}"></script>


</body>

</html>
