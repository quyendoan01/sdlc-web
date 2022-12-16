<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('', 'Tune Source') }}</title>
    <link rel="icon" href="https://seekicon.com/free-icon-download/music-note-list_1.svg">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com" style="color:white">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" type="text/css">

</head>

<body>
    <div id="app">
        <div class="home_top">
            <nav class="bar_top navbar navbar-expand-md navbar-light shadow-sm" style="height:65px">

                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <div class="search_bar">
                                <form action="{{ route('searchvid') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control"
                                            placeholder="What do you want listen to ?" aria-label="Search"
                                            aria-describedby="search-addon" />

                                        <button name="searchbtn" type="submit"
                                            class="searchbtn btn btn-outline-primary"><i
                                                class="bi bi-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            @guest
                            @else
                                    <div class="ticketUsd">
                                        <span style="float: right; color:aliceblue"><a class="a_none"
                                                href="{{ route('ticketUsd') }}"><i class="bi bi-plus"></i></a></span>
                                        <span class="usd"><i
                                                class="bi bi-currency-dollar"></i>&nbsp;
                                            @if (isset(DB::table('uvalue')->where('uid', Auth::user()->id)->first()->usd))
                                            {{ DB::table('uvalue')->where('uid', Auth::user()->id)->first()->usd }}
                                            @endif
                                        </span>
                                        <span class="ticket"><i
                                                class="bi bi-ticket-perforated"></i>&nbsp;&nbsp;
                                                @if (isset(DB::table('uvalue')->where('uid', Auth::user()->id)->first()->tickets))
                                                {{ DB::table('uvalue')->where('uid', Auth::user()->id)->first()->tickets }}
                                                @endif

                                            </span>
                                    </div>

                            @endguest

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav_link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav_link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav_link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('cart') }}">
                                            Cart
                                        </a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>

            </nav>
        </div>
        <div class="home_left">
            @guest
                @if (Route::has('login'))
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <h1 class="logo" style="font-family: Pacifico">
                            <i class="bi bi-music-note-list"></i>
                            <span style="font-size: 0.75em">Tune Source</span>
                        </h1>
                    </a>
                @endif
            @else
                @if (Auth::user()->role == true)
                    <a class="navbar-brand" href="{{ url('admin') }}">
                        <h1 class="logo" style="font-family: Pacifico">
                            <i class="bi bi-music-note-list"></i>
                            <span style="font-size: 0.75em">Admin</span>
                        </h1>
                    </a>
                @else
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <h1 class="logo" style="font-family: Pacifico">
                            <i class="bi bi-music-note-list"></i>
                            <span style="font-size: 0.75em">Tune Source</span>
                        </h1>
                    </a>
                @endif
            @endguest

            <ul class="menu_left">
                <li class="list_left">
                    @guest
                        @if (Route::has('login'))
                            <a class="nav-link" href="{{ url('/') }}">
                                <i class="bi bi-house"></i>
                                &ensp; Home
                            </a>
                        @endif
                    @else
                        @if (Auth::user()->role == true)
                            <a class="nav-link" href="{{ url('admin') }}">
                                <i class="bi bi-house"></i>
                                &ensp; Home
                            </a>
                        @else
                            <a class="nav-link" href="{{ url('/') }}">
                                <i class="bi bi-house"></i>
                                &ensp; Home
                            </a>
                        @endif
                    @endguest
                </li>
                @guest
                @else
                    <li class="list_left">
                        <a class="nav-link" href="{{ route('library', Auth::user()->id) }}">
                            <i class="bi bi-collection"></i>
                            &ensp; Your Library
                        </a>
                    </li>
                @endguest

                <li class="list_left">
                    <a class="nav-link" href="{{ url('trending') }}">
                        <i class="bi bi-fire"></i>
                        &ensp; Trending
                    </a>
                </li>
                <li class="list_left">
                    <a class="nav-link" href="{{ route('newcd') }}">
                        <i class="bi bi-music-note-beamed"></i>
                        &ensp; New CD
                    </a>
                </li>
                <li class="list_left">
                    <a class="nav-link" href="{{ route('category') }}">
                        <i class="bi bi-kanban"></i>
                        &ensp; Category
                    </a>
                </li>

            </ul>
            <hr style="width: 80%; color: #b3b3b3; margin:auto">
            {{-- @guest
            @else
                <ul class="menu_left">
                    <li class="list_left">
                        <a class="nav-link" href="#">
                            <i class="bi bi-plus-square-dotted"></i>
                            &ensp; Add Library
                        </a>
                    </li>
                </ul>
            @endguest --}}
        </div>
        <main class="main">

            @yield('content')

        </main>

        @if (isset($videosong))
            <audio id="theaudio" autoplay>
                <source src="<?php
                $url = $videosong->video_url;
                echo asset("audio/$url/$url"); ?>" type="audio/mpeg">
            </audio>
            <div class="home_bottom">
                <div class="container-fluid">
                    <div class="bottom_left">
                        <img class="card_img" src="{{ $videosong->video_image }}">
                        <h5>{{ $videosong->name }}</h5>
                        <p>{{ $videosong->author }}</p>
                    </div>
                    <div class="bottom_center">
                        <div class="play_bar_button">
                            <a href=" {{ route('backsong', $videosong->id) }}"><span class="btn_bar"><i
                                        class="bi bi-skip-backward"></i></span></a>
                            <a href="#"><span class="btn_bar"><i onclick="pauseAudio()" id="masterPlay"
                                        class="bi bi-pause"></i></span></a>
                            <a href="{{ route('nextsong', $videosong->id) }}"> <span class="btn_bar"><i
                                        class="bi bi-skip-forward"></i></span></a>

                        </div>
                        <div style="width: 100%; text-align:center">
                            <span class="currentTime" id="currentTime">00:00</span>
                            <span><input type="range" class="audioRange" name="myProgressBar" id="myProgressBar"
                                    min="0" max="100"></span>
                            <span class="durationTime" id="durationTime">00:00</span>
                        </div>
                    </div>
                    <div class="bottom_right">

                        @guest
                        @else
                            <a href="{{ route('add_cart', $videosong->id) }}"><button type="button"
                                    class="add_btn btn btn-dark">Add to
                                    Cart</button></a>
                            <a href="{{ route('add_library', $videosong->id) }}"><button type="button"
                                    class="add_btn btn btn-dark ">Add to
                                    Library</button></a>
                        @endguest
                        <div class="volBar">
                            <span><i class="bi bi-volume-down"></i><input class="audioVol" type="range"
                                    name="audioVol" id="audioVol" min="0" max="100"
                                    value="100"></span>
                        </div>
                    </div>
                </div>
            </div>
        @endif



    </div>
    <script>
        var myProgressBar = document.getElementById("myProgressBar");
        var masterPlay = document.getElementById("masterPlay");
        var x = document.getElementById("theaudio");
        var xVol = document.getElementById("audioVol");
        // var currentTime
        // var audio = document.querySelector('theaudio');


        function playAudio() {
            x.play();
            masterPlay.className = "bi bi-pause";
            masterPlay.setAttribute('onClick', 'pauseAudio()');
        }

        function pauseAudio() {
            x.pause();
            masterPlay.className = "bi bi-play";
            masterPlay.setAttribute('onClick', 'playAudio()');
        }

        x.ontimeupdate = function() {
            calTime()
        };

        function calTime() {

            let cur = parseInt(x.currentTime);
            let dur = parseInt(x.duration);

            var minutescur = Math.floor(cur / 60);
            var secondscur = cur - (minutescur * 60);

            if (minutescur < 10) {
                minutescur = "0" + minutescur;
            }
            if (secondscur < 10) {
                secondscur = "0" + secondscur;
            }

            var minutesdur = Math.floor(dur / 60);
            var secondsdur = dur - (minutesdur * 60);

            if (minutesdur < 10) {
                minutesdur = "0" + minutesdur;
            }
            if (secondsdur < 10) {
                secondsdur = "0" + secondsdur;
            }

            var curTime = minutescur + ':' + secondscur;
            var durTime = minutesdur + ':' + secondsdur;

            document.getElementById("currentTime").innerHTML = curTime;
            document.getElementById("durationTime").innerHTML = durTime;
        }

        x.addEventListener('timeupdate', () => {
            // console.log('timeupdate');
            progress = parseInt((x.currentTime / x.duration) * 100);
            // console.log(progress);
            myProgressBar.value = parseInt((x.currentTime / x.duration) * 100);
            // console.log(x.currentTime);

        })
        myProgressBar.addEventListener('change', () => {

            // console.log(myProgressBar.value * x.duration / 100);
            x.currentTime = myProgressBar.value * x.duration / 100;
        })

        xVol.addEventListener('change', () => {

            // console.log(myProgressBar.value * x.duration / 100);
            x.volume = xVol.value / 100;
        })

        function setCurTime() {
            document.getElementById("theaudio").currentTime = parseInt(5);
        }
    </script>
</body>

</html>
