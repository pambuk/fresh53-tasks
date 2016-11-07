<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todoodoos</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
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
            font-size: 64px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .glow {
            color: #fff;
            text-shadow: 0 0 5px #666, 0 0 10px #666, 0 0 20px #666, 0 0 30px #666, 0 0 40px #666, 0 0 55px #666, 0 0 75px #666;
        }
    </style>
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/YTPlayer.min.js"></script>
    <script>
        $(function () {
            $(".player").mb_YTPlayer();
        });
    </script>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}" class="glow" style="color: white">Home</a>
            @else
                <a href="{{ url('/login') }}" class="glow" style="color: white">Login</a>
                <a href="{{ url('/register') }}" class="glow" style="color: white">Register</a>
            @endif
        </div>
    @endif

    <div class="content">
        <a href="http://www.youtube.com/watch?v=BsekcY04xvQ" id="bgndVideo" class="player"
           data-property= "{videoURL:'BsekcY04xvQ',containment:'body', showControls:false, autoPlay:true, loop:false,
  vol:50, startAt:0, opacity:1, addRaster:false, quality:'default'}" >

        </a>
    </div>
</div>
</body>
</html>
