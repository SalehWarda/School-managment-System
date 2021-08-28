<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template"/>
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template"/>
    <meta name="author" content="potenzaglobalsolutions.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title> @yield('title') </title>

    <!-- CSS only -->
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}"/>
    <link href="{{ URL::asset('css/wizard.css') }}" rel="stylesheet" id="bootstrap-css">

    <!-- Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    @if (App::getLocale() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/rtl.css')}}"/>
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/ltr.css')}}"/>
    @endif

    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/dropzone/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/dropzone/dropzone.min.css')}}">



    @toastr_css

    @livewireStyles
</head>

<body>

<div class="wrapper">

    <!--=================================
     preloader -->

    <div id="pre-loader">
        <img src="{{asset('assets/images/pre-loader/loader-01.svg')}}" alt="">
    </div>

    <!--=================================
     preloader -->


    <!--=================================
     header start-->
@include('includes.header')
<!--=================================
     header End-->

    <!--=================================
     Main content -->

    <div class="container-fluid">
        <div class="row">

            <!-- Left Sidebar start-->
        @include('includes.sidebar')
        <!-- Left Sidebar End-->

            <!--=================================
           wrapper -->

            <div class="content-wrapper">


                @yield('content')
                <!--=================================
                 wrapper -->



                <!--=================================
                 footer -->

                @include('includes.footer')

                {{--footer--}}

                {{--=================================--}}

            </div><!-- main content wrapper end-->
        </div>
    </div>
</div>




<!--=================================
 jquery -->

<!-- jquery -->
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>

<!-- plugins-jquery -->
<script src="{{asset('assets/js/plugins-jquery.js')}}"></script>

<!-- plugin_path -->
<script type="text/javascript"> var plugin_path = '{{asset('assets/js')}}/';</script>

<!-- chart -->
<script src="{{asset('assets/js/chart-init.js')}}"></script>

<!-- calendar -->
<script src="{{asset('assets/js/calendar.init.js')}}"></script>

<!-- charts sparkline -->
<script src="{{asset('assets/js/sparkline.init.js')}}"></script>

<!-- charts morris -->
<script src="{{asset('assets/js/morris.init.js')}}"></script>

<!-- datepicker -->
<script src="{{asset('assets/js/datepicker.js')}}"></script>

<!-- sweetalert2 -->
<script src="{{asset('assets/js/sweetalert2.js')}}"></script>

<!-- toastr -->
<script src="{{asset('assets/js/toastr.js')}}"></script>

<!-- validation -->
<script src="{{asset('assets/js/validation.js')}}"></script>

<!-- lobilist -->
<script src="{{asset('assets/js/lobilist.js')}}"></script>

<!-- custom -->
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('assets/app-assets/dropzone/dropzone.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/app-assets/dropzone/dropzone.min.js')}}" type="text/javascript"></script>



@yield('script')

<script>
    function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;
        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }
</script>

@toastr_js
@toastr_render

@livewireScripts

</body>


</html>
