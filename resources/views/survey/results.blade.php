<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

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

    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</head>

<body class="" style="background-image:url({{asset('img/back.jpg')}});background-repeat: no-repeat;background-size: cover; ">
<div class="wrapper ">
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-4">

                        <center>
                            <a class="btn btn-success" href="{{ asset('/') }}">
                                Home
                            </a>
                            <a class="btn btn-success" href="{{ asset('/do_login') }}">LOGIN</a>
                            <a class="btn btn-success" href="{{ asset('/do_register') }}">REGISTER</a>
                        </center>

                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Survey results</h4>
                            </div>
                            <div class="card-body">
                                @foreach($survey as $key )
                                    <label for="exampleFormControlSelect1">{{$key->question}}</label>
                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" checked>
                                                {{$key->answer}}
                                                <span class="circle">
                                       <span class="check"></span>
                                    </span>
                                            </label>
                                        </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
        </footer>
    </div>
</div>

<script src="../assets/js/core/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

</body>

</html>
