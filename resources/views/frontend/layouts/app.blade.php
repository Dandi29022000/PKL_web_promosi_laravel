<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Sewa Permainan | Sewa Games | Games Event | Global Kidz</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
		
		<!-- all css here -->
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/pe-icon-7-stroke.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/icofont.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/meanmenu.min.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/easyzoom.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/bundle.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/responsive.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.min.css') }}">
        <script src="{{ asset('themes/ezone/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

        <!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- header -->

        <header>
            <div class="header-top-furniture wrapper-padding-2 res-header-sm">
                <div class="container-fluid">
                    <div class="header-bottom-wrapper">
                        <div class="logo-2 furniture-logo ptb-10">
                            <a href="/">
                                <img src="{{ asset('img/logo.png') }}" alt="">
                            </a>
                        </div>
                        <div class="menu-style-2 furniture-menu menu-hover">
                            <nav>
                                <ul>
                                    <li><a href="/frontend-dashboard">home</a>
                                    </li>
                                    <li><a href="#">catalogue</a>
                                        <ul class="single-dropdown">
                                            <li><a href="/frontend-inflatables">Inflatables</a></li>
                                            <li><a href="/frontend-interactive">Interactive</a></li>
                                            <li><a href="/frontend-carnival">Carnival</a></li>
                                            <li><a href="/frontend-water">Water</a></li>
                                            <li><a href="/frontend-electrical">Electrical</a></li>
                                            <li><a href="/frontend-funny">Funny</a></li>
                                            <li><a href="/frontend-outbound">Outbound</a></li>
                                            <li><a href="/frontend-entertainment">Entertainment</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="frontend-about">about us</a>
                                    </li>
                                    <li><a href="#">event</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-cart">
                            <?php
                                 $Sewa_utama = \App\Models\Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();
                                 if(!empty($Sewa_utama))
                                    {
                                     $notif = \App\Models\SewaDetail::where('Sewa_id', $Sewa_utama->id)->count(); 
                                    }
                                ?>
                            <a class="icon-cart-furniture" href="{{ url('frontend/check-out') }}">
                                <i class="ti-shopping-cart"></i>
                                @if(!empty($notif))
                                <span class="shop-count-furniture green">{{ $notif }}</span>
                                @endif
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active">
                                    <ul class="menu-overflow">
                                        <li><a href="/frontend-dashboard">HOME</a>
                                        </li>
                                        <li><a href="#">catalogue</a>
                                            <ul class="single-dropdown">
                                                <li><a href="/frontend-inflatables">Inflatables</a></li>
                                                <li><a href="/frontend-interactive">Interactive</a></li>
                                                <li><a href="/frontend-carnival">Carnival</a></li>
                                                <li><a href="/frontend-water">Water</a></li>
                                                <li><a href="/frontend-electrical">Electrical</a></li>
                                                <li><a href="/frontend-funny">Funny</a></li>
                                                <li><a href="/frontend-outbound">Outbound</a></li>
                                                <li><a href="/frontend-entertainment">Entertainment</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">about us</a>
                                        </li>
                                        <li><a href="#">event</a>
                                        </li>
                                    </ul>
                                </nav>							
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom-furniture wrapper-padding-2 border-top-3">
                <div class="container-fluid">
                    <div class="furniture-bottom-wrapper">  
                        <div class="furniture-login">
                            <ul>
                                <li>Hello: <a href="#">{{ Auth::user()->name }}</a></li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </div>    
                    
                        <div class="furniture-search">
                            <form action="#" method="GET">
                                <input placeholder="I am Searching for . . ." type="text" name="q" value="{{ isset($q) ? $q : null }}">
                                <button>
                                    <i class="ti-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="furniture-wishlist">
                            <ul>
                                <li><a href="#"><i class="ti-heart"></i> Favorites</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- end -->
        
        @yield('content')
       
        <!-- services -->
        <div class="services-area wrapper-padding-4 gray-bg pt-120 pb-80">
            <div class="container-fluid">
                <div class="services-wrapper">
                    <div class="single-services mb-40">
                        <div class="services-img">
                            <img src="{{ asset('themes/ezone/assets/img/icon-img/26.png') }}" alt="">
                        </div>
                        <div class="services-content">
                            <h4>Free Shippig</h4>
                            <p>Contrary to popular belief, Lorem Ipsum is random text. </p>
                        </div>
                    </div>
                    <div class="single-services mb-40">
                        <div class="services-img">
                            <img src="{{ asset('themes/ezone/assets/img/icon-img/27.png') }}" alt="">
                        </div>
                        <div class="services-content">
                            <h4>24/7 Support</h4>
                            <p>Contrary to popular belief, Lorem Ipsum is random text. </p>
                        </div>
                    </div>
                    <div class="single-services mb-40">
                        <div class="services-img">
                            <img src="{{ asset('themes/ezone/assets/img/icon-img/28.png') }}" alt="">
                        </div>
                        <div class="services-content">
                            <h4>Secure Payments</h4>
                            <p>Contrary to popular belief, Lorem Ipsum is random text. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end -->

        <!-- footer -->
        <footer class="footer-area">
            <div class="footer-top-area pt-70 pb-35 wrapper-padding-5">
                <div class="container-fluid">
                    <div class="widget-wrapper">
                        <div class="footer-widget mb-30">
                            <a href="#"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                            <div class="footer-about-2">
                                <p>Global Kidz adalah penyedia jasa sewa permainan No.1 di indonesia. <br> 
                                Kami juga menyediakan jasa sewa games, game event, <br> dan game activation.
                                 GMG senantiasa menjaga profesionalitasnya <br> sejak berdirinya yaitu Tahun 2004.</p>
                            </div>
                        </div>
                        <div class="footer-widget mb-30">
                            <h3 class="footer-widget-title-5">Contact Info</h3>
                            <div class="footer-info-wrapper-3">
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>Alamat: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p>JL. MAMPANG PRAPATAN VIII R 11, <br> JAKARTA SELATAN</p>
                                    </div>
                                </div>
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>WA: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p>081-7691-2757</p>
                                    </div>
                                </div>
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>E-mail: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p><a href="#">INFO@GLOBAL-K</a></p>
                                    </div>
                                </div>
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>Jam Kerja: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p><a href="#">08.00 – 17.00</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-widget mb-30">
                            <h3 class="footer-widget-title-5">Subscribe</h3>
                            <div class="footer-newsletter-2">
                                <p>Send us your mail or next updates</p>
                                <div id="mc_embed_signup" class="subscribe-form-5">
                                    <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                        <div id="mc_embed_signup_scroll" class="mc-form">
                                            <input type="email" value="" name="EMAIL" class="email" placeholder="Enter mail address">
                                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                            <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom ptb-20 gray-bg-8">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="copyright-furniture">
                            Copyright © 2023 Global Kidz <br> Powered by Global Kidz</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end -->
        <div id="loader" style="display: none;">
            <div id="loading" style="z-index:99999;position: fixed;top:0;left:0;right:0;bottom:0;background-color:rgba(0,0,0,.3);display: flex;justify-content:center;align-items: center;" class="mx-auto">
                <p><img src="{{ asset('themes/ezone/assets/img/loading.gif') }}" /> Please Wait</p>
            </div>
        </div>
		
		<!-- all js here -->
        <script src="{{ asset('themes/ezone/assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/popper.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/ajax-mail.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/main.js') }}"></script>
        <script src="{{ asset('themes/ezone/assets/js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
        <script>
            $(".delete").on("click", function () {
                return confirm("Do you want to remove this?");
            });
        </script>
        @stack('script-alt')
    </body>
</html>