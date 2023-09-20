<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Sewa Permainan | Sewa Games | Games Event | Global Kidz</title>
    <link rel="shortcut icon" type="image/png" href="assets/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- css files -->
    <link href="{{ asset('frontend/web/css/bootstrap.css') }}" rel="stylesheet" media="all" />
    <link href="{{ asset('frontend/web/css/font-awesome.css') }}" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="{{ asset('frontend/web/css/set2.css') }}" />
    <link href="{{ asset('frontend/web/css/imagelightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/web/css/style.css') }}" rel="stylesheet" media="all" />
    <link href="{{ asset('frontend/web/css/responsive.css') }}" rel="stylesheet" media="all" />
    <!-- /css files -->

    <script src="{{ asset('frontend/web/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('frontend/web/js/bootstrap.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <!-- navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent position-fixed w-100">
        <div class="container">
            <style>
                /* CSS untuk mengatur ukuran dan gaya huruf pada teks "SMP Islam Thoriqul Huda Ponorogo" */
                .navbar-brand span {
                    font-weight: bold;
                    font-size: 24px; /* Ubah ukuran sesuai keinginan Anda */
                }

                .navbar-brand {
                    display: flex;
                    align-items: center;
                }

                .navbar-brand img {
                    margin-right: 10px; /* Atur jarak antara logo dan teks */
                }
            </style>

            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" width="75" height="75" class="mt-4 mr-2">
                <H1 class="mt-4"><b>GLOBAL KIDZ</b></H1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-3">
                        <a class="nav-link active" aria-current="page" href="{{ route('frontend.dashboard') }}">Beranda</a>
                    </li>
                    
                    <li class="nav-item dropdown mx-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Catalogue
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/frontend-inflatables">Inflatables</a></li>
                            <li><a class="dropdown-item" href="#">Interactive</a></li>
                            <li><a class="dropdown-item" href="#">Carnival</a></li>
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
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} 
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">
                                Profile
                            </a>

                            <a class="dropdown-item" href="#">
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
    <!-- //navigation -->

    <!--//banner section starts here-->
    <!-- Slider  -->
    <section class="jarallax callbacks_container w3-layouts">
        <ul class="rslides callbacks callbacks1 agileits" id="slider4">
            <li id="callbacks1_s1" class="" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 500ms ease-in-out;">
                <img src="{{ asset('frontend/web/images/header/bg1.png') }}" alt="home" />
                <div class="caption text-center">
                    <h3>Since 2004 we organize event seriously</h3>
                    <p>Global Kidz adalah penyedia jasa sewa permainan No.1 di indonesia. Kami juga menyediakan jasa sewa games, game event, dan game activation, Global Kidz senantiasa menjaga profesionalitasnya sejak berdirinya yaitu Tahun 2004.</p>
                </div>
            </li>
            <li id="callbacks1_s2" class="" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 500ms ease-in-out;">
                <img src="{{ asset('frontend/web/images/header/bg3.png') }}" alt="home" />
                <div class="caption text-center">
                    <h3>Since 2004 we organize event seriously</h3>
                    <p>Global Kidz adalah penyedia jasa sewa permainan No.1 di indonesia. Kami juga menyediakan jasa sewa games, game event, dan game activation, Global Kidz senantiasa menjaga profesionalitasnya sejak berdirinya yaitu Tahun 2004.</p>
                </div>
            </li>
            <li id="callbacks1_s3" class="callbacks1_on" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 500ms ease-in-out;">
                <img src="{{ asset('frontend/web/images/header/bg2.png') }}" alt="home" />
                <div class="caption text-center">
                    <h3>Since 2004 we organize event seriously</h3>
                    <p>Global Kidz adalah penyedia jasa sewa permainan No.1 di indonesia. Kami juga menyediakan jasa sewa games, game event, dan game activation, Global Kidz senantiasa menjaga profesionalitasnya sejak berdirinya yaitu Tahun 2004.</p>
                </div>
            </li>
            <li id="callbacks1_s6" class="callbacks1_on" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 500ms ease-in-out;">
                <img src="{{ asset('frontend/web/images/header/bg4.png') }}" alt="home" />
                <div class="caption text-center">
                    <h3>Since 2004 we organize event seriously</h3>
                    <p>Global Kidz adalah penyedia jasa sewa permainan No.1 di indonesia. Kami juga menyediakan jasa sewa games, game event, dan game activation, Global Kidz senantiasa menjaga profesionalitasnya sejak berdirinya yaitu Tahun 2004.</p>
                </div>
            </li>
        </ul>
        <a href="#" class="callbacks_nav callbacks1_nav prev">Previous</a><a href="#" class="callbacks_nav callbacks1_nav next">Next</a>
    </section>
    <!-- /Slider  -->
    <!--//banner-->

    <div id="content">
        @yield('content')
    </div>

    <!-- footer -->
    <div class="agileits_w3layouts-footer">
        <div class="container">
            <div class="agileinfo-footer">
                <div class="col-md-6 col-sm-6 social-icons">
                    <ul>
                        <li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
                        <li><a href="#" class="fa fa-twitter  icon-border twitter"> </a></li>
                        <li><a href="#" class="fa fa-google-plus  icon-border googleplus"> </a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-6 w3_agile-copyright text-center">
                    <font color="white">Copyright &#169;
                        <script type='text/javascript'>
                            var creditsyear = new Date();
                            document.write(creditsyear.getFullYear());
                        </script>
                    </font>
                </div>
            </div>
        </div>
    </div>
    <!-- //footer -->
    <script src="{{ asset('frontend/web/js/script.js') }}"></script>
    <script src="{{ asset('frontend/web/js/imagelightbox.js') }}"></script>
    <script>
        $('a[data-imagelightbox="g"]').imageLightbox({
            activity: true,
            arrows: true,
            button: true,
            caption: true,
            navigation: true,
            overlay: true,
            quitOnDocClick: false,
            selector: 'a[data-imagelightbox="f"]'
        });
    </script>
    <!-- Banner-plugin -->
    <script src="{{ asset('frontend/web/js/responsiveslides.min.js') }}"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function() {
            // Slider
            $("#slider4").responsiveSlides({
                auto: true,
                pager: false,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function() {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function() {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!-- //Banner-plugin -->
    <script src="{{ asset('frontend/web/js/jarallax.js') }}"></script>
    <script src="{{ asset('frontend/web/js/SmoothScroll.min.js') }}"></script>
    <script type="text/javascript">
        /* init Jarallax */
        $('.jarallax').jarallax({
            speed: 0.5,
            imgWidth: 1366,
            imgHeight: 768
        })
    </script>
    <!-- here starts scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
            	var defaults = {
            	containerID: 'toTop', // fading element id
            	containerHoverID: 'toTopHover', // fading element hover id
            	scrollSpeed: 1200,
            	easingType: 'linear'
            	};
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>

    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="{{ asset('frontend/web/js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/web/js/easing.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- /ends-smoth-scrolling -->
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- //here ends scrolling icon -->
</body>

</html>
