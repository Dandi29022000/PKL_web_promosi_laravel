<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sewa Permainan | Sewa Games | Games Event | Global Kidz</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" class="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.min.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" width="75" height="75" class="mt-6 mr-2">
                        <b>GLOBAL KIDZ</b>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item mx-3">
                            <a class="nav-link active" aria-current="page" href="/frontend-dashboard">Beranda</a>
                        </li>
                        
                        <li class="nav-item dropdown mx-3">
                            <a class="nav-link dropdown-toggle" href="/frontend-dashboard" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Catalogue
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/frontend-inflatables">Inflatables</a></li>
                                <li><a class="dropdown-item" href="/frontend-interactive">Interactive</a></li>
                                <li><a class="dropdown-item" href="/frontend-carnival">Carnival</a></li>
                                <li><a class="dropdown-item" href="#">Water</a></li>
                                <li><a class="dropdown-item" href="#">Electrical</a></li>
                                <li><a class="dropdown-item" href="#">Funny</a></li>
                                <li><a class="dropdown-item" href="#">Outbound</a></li>
                                <li><a class="dropdown-item" href="#">Entertainment</a></li>
                            </ul>
                        </li>

                        <li class="nav-item mx-3">
                            <a class="nav-link" href="#">About Us</a>
                        </li>

                        <li class="nav-item mx-3">
                            <a class="nav-link" href="#">Event</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <?php
                                 $Sewa_utama = \App\Models\Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();
                                 if(!empty($Sewa_utama))
                                    {
                                     $notif = \App\Models\SewaDetail::where('Sewa_id', $Sewa_utama->id)->count(); 
                                    }
                                ?>
                            <a class="nav-link" href="{{ url('frontend/check-out') }}">
                                <i class="fa fa-shopping-cart"></i>
                                @if(!empty($notif))
                                <span class="badge badge-danger">{{ $notif }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('profile') }}">
                                    Profile
                                </a>

                                <a class="dropdown-item" href="{{ url('history') }}">
                                    Riwayat Pemesanan
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

</body>
</html>
