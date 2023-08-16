<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>POS - Sederhana</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('../asset/images/favicon.png') }}">
    <link href="{{ asset('../asset/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('../asset/vendor/chartist/css/chartist.min.css') }}">
    <link href="{{ asset('../asset/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('../asset/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <link href="{{ asset('../asset/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('../asset/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('../asset/vendor/jquery/jquery.min.js') }}"></script>

</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('../asset/images/logo.png')}}" alt="">
                <span class="nav-text text-primary ml-3"> POS - Sederhana</span>
                {{-- <img class="logo-compact" src="{{ asset('../asset/images/logo-text.png')}}" alt="">
                <img class="brand-title" src="{{ asset('../asset/images/logo-text.png')}}" alt=""> --}}
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Header start
		***********************************-->

			@include('layouts/header')
		
		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
		
			@include('layouts/sidebar')

        <!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
            @yield('css')
             <!-- konten -->
			 @yield('judul')

			 @yield('konten')

        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        
			@include('layouts/footer')

        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('../asset/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('../asset/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('../asset/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('../asset/js/custom.min.js') }}"></script>
	<script src="{{ asset('../asset/js/deznav-init.js') }}"></script>
	
	<!-- Counter Up -->
    <script src="{{ asset('../asset/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('../asset/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>	
		
	<!-- Apex Chart -->
	<script src="{{ asset('../asset/vendor/apexchart/apexchart.js') }}"></script>	
	
	<!-- Chart piety plugin files -->
	<script src="{{ asset('../asset/vendor/peity/jquery.peity.min.js') }}"></script>
	
	<!-- Dashboard 1 -->
    <script src="{{ asset('../asset/js/dashboard/dashboard-1.js') }}"></script>
    
    <!-- Sweet Alert -->

    
    @yield('script')
	
</body>
</html>