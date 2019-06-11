<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>
        Survey
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        body {background:#000}
        .loading {
            -webkit-animation:fadein 2s;
            -moz-animation:fadein 2s;
            -o-animation:fadein 2s;
            animation:fadein 2s;
        }
        @-moz-keyframes fadein {
            from {opacity:0}
            to {opacity:1}
        }
        @-webkit-keyframes fadein {
            from {opacity:0}
            to {opacity:1}
        }
        @-o-keyframes fadein {
            from {opacity:0}
            to {opacity:1}
        }
        @keyframes fadein {
            from {opacity:0}
            to {opacity:1}
        }

        .spinner-wrapper {
            min-width:100%;
            min-height:100%;
            height:100%;
            top:0;
            left:0;
            background:rgba(255,255,255,0.93);
            position:absolute;
            z-index:300;
        }

        .spinner-text {position:absolute;top:41.5%;left:47%;margin:16px 0 0 35px;font-size:9px;font-family:Arial;color:#BBB;letter-spacing:1px;font-weight:700}
        .spinner {
            margin:0;
            display:block;
            position:absolute;
            left:45%;
            top:40%;
            border:25px solid rgba(100,100,100,0.2);
            width:1px;
            height:1px;
            border-left-color:transparent;
            border-right-color:transparent;
            -webkit-border-radius:50px;
            -moz-border-radius:50px;
            border-radius:50px;
            -webkit-animation:spin 1.5s infinite;
            -moz-animation:spin 1.5s infinite;
            animation:spin 1.5s infinite;
        }

        @-webkit-keyframes spin {
            0%,100% {-webkit-transform:rotate(0deg) scale(1)}
            50%     {-webkit-transform:rotate(720deg) scale(0.6)}
        }

        @-moz-keyframes spin  {
            0%,100% {-moz-transform:rotate(0deg) scale(1)}
            50%     {-moz-transform:rotate(720deg) scale(0.6)}
        }
        @-o-keyframes spin  {
            0%,100% {-o-transform:rotate(0deg) scale(1)}
            50%     {-o-transform:rotate(720deg) scale(0.6)}
        }
        @keyframes spin  {
            0%,100% {transform:rotate(0deg) scale(1)}
            50%     {transform:rotate(720deg) scale(0.6)}
        }

    </style>
</head>

<body class="" style="background-image:url({{asset('img/back.jpg')}});background-repeat: no-repeat;background-size: cover; ">
<div class="wrapper ">
    <div class="sidebar" data-color="green" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo">
            <a href="#" class="simple-text logo-normal">
                SURVEY TOOL
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="card card-profile" style="margin-top: 60px">
                <div class="card-avatar">
                    <a href="#">
                        <img class="img" src="{{asset('img/profile.jpg')}}" />
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ Auth::user()->name }}</h4>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"
                       class="btn btn-success btn-round">Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item  ">
                    <a class="nav-link" href="{{asset('/home')}}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{asset('/survey_list')}}">
                        <i class="material-icons">content_paste</i>
                        <p>Survey</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
            </div>
        </nav>

        @yield('content')

        <footer class="footer">
        </footer>
    </div>
</div>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap-material-design.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Plugin for the momentJs  -->
<script src="../assets/js/plugins/moment.min.js"></script>
<!--  Plugin for Sweet Alert -->
<script src="../assets/js/plugins/sweetalert2.js"></script>
<!-- Forms Validations Plugin -->
<script src="../assets/js/plugins/jquery.validate.min.js"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../assets/js/plugins/fullcalendar.min.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="../assets/js/plugins/jquery-jvectormap.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="../assets/js/plugins/arrive.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv2k-xpppQ-fkHF2AYmKIPolr89OKPtZU"></script>
<!-- Chartist JS -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>
</body>

</html>
