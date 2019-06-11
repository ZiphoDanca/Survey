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

<body class="" style="background-image:url({{asset('img/back.jpg')}});background-repeat: no-repeat;background-size: cover; ">
<div class="wrapper ">
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-6">

                        <center>
                            <a class="btn btn-success" href="{{ asset('/') }}">
                                Home
                            </a>
                            <a class="btn btn-success" href="{{ asset('/do_login') }}">LOGIN</a>
                            <a class="btn btn-success" href="{{ asset('/do_register') }}">REGISTER</a>
                        </center>

                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Choose a survey</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead class="text-warning">
                                    <th>Tittle</th>
                                    <th>Description</th>
                                    <th>Questions</th>
                                    <th>Time</th>
                                    <th>Start</th>
                                    </thead>
                                    <tbody>
                                    @foreach($surveys as $survey)
                                        <tr>
                                            <td>{{$survey->title}}</td>
                                            <td>{{$survey->description}}</td>
                                            <td>{{count($survey->question)}}</td>
                                            @if($survey->time == "00:00:00")
                                                <td>Not Specified</td>
                                            @else
                                                <td>{{$survey->time}}</td>
                                            @endif
                                            <td>
                                                <a href="{{url('conduct_survey', $survey->key)}}" class="btn btn-success btn-fab btn-fab-mini btn-round">
                                                    <i class="material-icons">play_arrow</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if(count($surveys) == 0)
                                        <tr>
                                            <td>No surveys found</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
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
