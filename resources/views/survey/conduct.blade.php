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

                        <input type="text" name="url" id="url" hidden>

                        <center>
                            <a class="btn btn-success" href="{{ asset('/') }}">
                                Home
                            </a>
                            <a class="btn btn-success" href="{{ asset('/do_login') }}">LOGIN</a>
                            <a class="btn btn-success" href="{{ asset('/do_register') }}">REGISTER</a>
                        </center>

                        @if($survey->time != 0)
                        <div>Survey closes in <span id="time">{{$survey->time}} minutes</span></div>

                        <input id="timeDue" type="text" value="{{$survey->time}}" hidden>
                        @endif

                        <input id="surveyId" type="text" value="{{$survey->id}}" hidden>

                        <input id="ip" type="text" hidden>

                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Complete a Survey</h4>
                            </div>
                            <div class="card-body">
                                @foreach($questions as $question )
                                    <label for="exampleFormControlSelect1">{{$question->question}}</label>
                                     <input type="text" id="question" name="question" value="{{$question->question}}" hidden>
                                        <div class="form-group">
                                            <select class="form-control" id="{{$question->id}}" data-style="btn btn-link" id="exampleFormControlSelect1">
                                                <option value="N/A">Select</option>
                                                @foreach($question->answer as $answer)
                                                <option value="{{$answer->answer}}">{{$answer->answer}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                @endforeach
                                    <button onclick="saveSurvey();" type="submit" class="btn btn-success btn-round">SUBMIT</button>
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
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = duration;
                saveSurvey();
            }
        }, 1000);
    }

    window.onload = function () {

        var id= document.getElementById('surveyId').value;

        $.getJSON("http://jsonip.com?callback=?", function (data) {

            document.getElementById('ip').value = data.ip;

            $.ajax({
                type: 'POST',
                url: '{{asset('api/survey_user')}}',
                data: {
                    'surveyID': id,
                    'ip': data.ip
                },
                success: function (data) {
                    if(data['status'] == "saved")
                    {
                        document.getElementById('url').value = data['id'];
                    }
                    else if(data['status'] == "error"){
                        Swal.fire({
                            position: 'center',
                            type: 'error',
                            title: 'You have already completed the survey',
                            showConfirmButton: true
                        })
                            .then((id) => {
                                window.location = "{{url('/survey_result')}}"+"/"+ data['id'];
                            });
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    Swal.fire({
                        position: 'top-end',
                        type: 'error',
                        title: errorThrown,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });

        });

        if(document.getElementById('timeDue').value != 0)
        {
            var fiveMinutes = 60 * document.getElementById('timeDue').value,
                display = document.querySelector('#time');
            startTimer(fiveMinutes, display);
        }
    };

    function saveSurvey() {

        var id= document.getElementById('surveyId').value;

        $.get('{{url('/getSurveyQuestion/' )}}'+'/'+id, function (data) {

            var survey = data.length;

            for (var i = 0; i < data.length; i++) {

                var questiion = data[i]['question'];

                var Qid= "#" + data[i]['id'];

                var ip = $("#ip").val();

                $.ajax({
                    type: 'POST',
                    url: '{{asset('api/survey_conduct')}}',
                    data: {
                        'surveyID': id,
                        'ip': ip,
                        'question': questiion,
                        'answer' : $(Qid).val()
                    },
                    success: function (data) {
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                    }
                });
            }

            Swal.fire({
                position: 'center',
                type: 'success',
                title: 'You have successfully completed the survey.',
                showConfirmButton: true
            })
                .then((id) => {
                    window.location = "{{url('/survey_result')}}"+"/"+ document.getElementById('url').value;
                });

        });
    }

</script>

</body>

</html>
