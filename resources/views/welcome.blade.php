<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    to zrób: <a href="http://redmine.polcode.com/issues/21756">http://redmine.polcode.com/issues/21756</a>
                </div>

                <div>
                    <pre>
Stwórz aplikację, z możliwością logowania oraz rejestracji(username, email, password, z linkiem

aktywacyjnym). Po zalogowaniu powinno wyświetlić się menu z odsyłaczami do:

-ustawień, gdzie po lewej stronie będzie panel, który będzie wyświetlać nazwę użytkownika

oraz email jako readonly, a po prawej formularz, dzięki któremu użytkownik będzie mógł zmienić

swoje hasło(za potwierdzeniem starego hasła).

-zadań, gdzie po lewej stronie będzie input na zadanie oraz datę jego planowanego

zakończenia, a po prawej będą dwie listy: dodanych zadań do zrobienia sortowana wg planowanego

czasu zakończenia, ikony do ich usuwania i zaznaczania ich jako zrobione oraz zadań zaznaczonych

jako zrobione z ikoną do usuwania.

-wylogowania

Aplikacja powinna wykorzystać vue.js oraz dowolnego frameworka. Wszystkie dane powinny być zapisywane w bazie

danych.
                    </pre>
                </div>
            </div>
        </div>
    </body>
</html>
