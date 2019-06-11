<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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

</head>

<body class="" style="background-image:url(img/back.jpg);background-repeat: no-repeat;background-size: cover; ">
<div class="wrapper ">
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">REGISTER</h4>
                            </div>
                            <div class="card-body">

                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if (session('warning'))
                                    <div class="alert alert-warning">
                                        {{ session('warning') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('register') }}" id="registerForm">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Fist Name</label>
                                                <input type="text" name="firstname" id="firstname" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Last Name</label>
                                                <input type="text" name="lastname" id="lastname" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Email Address</label>
                                                <input type="email" name="email" id="email" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Password</label>
                                                <input type="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Confirm Password</label>
                                                <input type="password" id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" onclick="validate();" class="btn btn-success pull-right">Submit</button>
                                    <a class="btn btn-link" href="{{ asset('/do_login') }}">
                                        Login
                                    </a>
                                    <div class="clearfix"></div>
                                    <a class="btn btn-link" href="{{ asset('/') }}">
                                        Home
                                    </a>
                                </form>
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

<script>
    function validate() {

        $('#registerForm').validate({
            rules: {
                firstname: {
                    required: true
                },
                lastname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    password: true
                },
                password_confirmation: {
                    required: true,
                    password: true
                },
            }
        });
    }


</script>

</body>

</html>
