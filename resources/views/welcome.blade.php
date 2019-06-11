<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Survey</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            /* Style the video: 100% width and height to cover the entire window */
            #myVideo {
                position: fixed;
                right: 0;
                bottom: 0;
                min-width: 100%;
                min-height: 100%;
            }

            /* Add some content at the bottom of the video/page */
            .content {
                position: fixed;
                background: rgba(0, 0, 0, 0.5);
                color: white;
                width: 100%;
                padding: 20px;
            }

            /* Style the button used to pause/play the video */
            #myBtn {
                width: 200px;
                font-size: 18px;
                padding: 10px;
                border: none;
                background: #000;
                color: #fff;
                cursor: pointer;
            }

            #myBtn:hover {
                background: #ddd;
                color: black;
            }
        </style>
    </head>
    <body>
    <!-- The video -->
    <video autoplay muted loop id="myVideo">
        <source src="{{ url('video/Traffic.mp4') }}" type="video/mp4">
    </video>

    <!-- Optional: some overlay text to describe the video -->
    <div class="content">
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    WELCOME
                </div>
                <h2>Survey Tool</h2>

                <br/>

                <div class="links">
                    <a href="{{ asset('/do_login') }}">LOGIN</a>
                    <a href="{{ asset('/do_register') }}">REGISTER</a>
                    <a href="{{asset('/all_survey')}}">SURVEY</a>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
