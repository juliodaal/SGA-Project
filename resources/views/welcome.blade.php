<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Welcome
                </div>
            </div>
        </div>


        <form class="form-signin" action="../App/Controllers/ValidateUser.php" method="post">
            <div class="container-logotype-h1-form">
                <img src="{{ asset('image/Logótipo_do_Instituto_Politécnico_de_Setúbal.png') }}" alt="logotype IPS" width="72" height="72">
                <h1 class="">SGA</h1>
            </div>
            <div class="container-inputs-labels-form">
                <h2>Login.</h2>
                <div>
                    <input type="email" id="inputEmail" name="email" placeholder="Email" maxlength="35" name="email" require>
                    <i class="fa">&#xf0e0;</i>
                </div>
                <div>
                    <input type="password" id="inputPassword" class="" name="password" placeholder="Password"  name="password" require>
                    <i class="fa">&#xf023;</i>
                </div>
                <button type="submit" id="button">Sign in</button>
            </div>
        </form> 
    </body>
</html>
