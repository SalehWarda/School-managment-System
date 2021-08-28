
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

    <!-- Font -->
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/rtl.css') }}" />

</head>

<body>

<div class="wrapper">

    <!--=================================
     preloader -->

    <div id="pre-loader">
        <img src="{{ asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
    </div>

    <!--=================================
     preloader -->

    <!--=================================
    login-->

    <section class="height-100vh d-flex align-items-center page-section-ptb login" style="background-image: url(images/login-bg.jpg);" >
        <div class="container">

            @yield('content')

        </div>
    </section>

    <!--=================================
     login-->

</div>



<!--=================================
 jquery -->

<!-- jquery -->
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

<!-- plugins-jquery -->
<script src="{{ asset('assets/js/plugins-jquery.js') }}"></script>

<!-- plugin_path -->
<script>var plugin_path = 'js/';</script>

<!-- chart -->
<script src="{{ asset('assets/js/chart-init.js') }}"></script>

<!-- calendar -->
<script src="{{ asset('assets/js/calendar.init.js') }}"></script>

<!-- charts sparkline -->
<script src="{{ asset('assets/js/sparkline.init.js') }}"></script>

<!-- charts morris -->
<script src="{{ asset('assets/js/morris.init.js') }}"></script>

<!-- datepicker -->
<script src="{{ asset('assets/js/datepicker.js') }}"></script>

<!-- sweetalert2 -->
<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>

<!-- toastr -->
<script src="{{ asset('assets/js/toastr.js') }}"></script>

<!-- validation -->
<script src="{{ asset('assets/js/validation.js') }}"></script>

<!-- lobilist -->
<script src="{{ asset('assets/js/lobilist.js') }}"></script>

<!-- custom -->
<script src="{{ asset('assets/js/custom.js') }}"></script>

</body>
</html>
