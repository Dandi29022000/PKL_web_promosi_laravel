@extends('frontend.layouts.app')
@section('content')

<div
    class="site-cover site-cover-sm same-height overlay single-page"
    style="background-image: url({{ asset('img/2.jpg') }})"
>
<div class="container">
    <div class="row same-height justify-content-center">
        <div class="col-md-6">
        <div class="post-entry text-center">
            <h1 class="mb-4">About Us</h1>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="section sec-halfs py-0">
    <div class="container">
        <div class="half-content d-lg-flex align-items-stretch">
            <div
            class="img"
            style="background-image: url('img/About-Us.jpg')"
            data-aos="fade-in"
            data-aos-delay="100"
            ></div>
            <div class="text">
                <h2 class="heading text-primary mb-3">
                    Global Kidz
                </h2>
                <p class="mb-4">
                    Global Kidz adalah penyedia jasa sewa permainan No.1 di indonesia. 
                    Kami juga menyediakan jasa sewa games, game event, dan game activation.
                    Global Kidz senantiasa menjaga profesionalitasnya sejak berdirinya yaitu Tahun 2004.
                </p>

                <div class="social-links mb-3">
                    <a href="https://web.facebook.com/profile.php?id=100063912703503&locale=id_ID"><i class="fab fa-facebook-f mr-3"></i></a>
                    <a href="https://twitter.com/Globalkidz_EO"><i class="fab fa-twitter mr-3"></i></a>
                    <a href="https://instagram.com/globalkidzeo?igshid=MzRlODBiNWFlZA=="><i class="fab fa-instagram mr-3"></i></a>
                    <a href="https://id.pinterest.com/gmgcoid/"><i class="fab fa-pinterest"></i></a>
                </div>
                <p>
                    <a href="#" class="btn btn-outline-primary py-1">Read more</a>
                </p>
            </div>
        </div>

        <div class="half-content d-lg-flex align-items-stretch">
          <div
            class="img order-md-2"
            style="background-image: url('img/3.jpg')"
            data-aos="fade-in"
          ></div>
          <div class="text">
            <h2 class="heading text-primary mb-3">
                Sewa permainan terlengkap untuk segala event!
            </h2>
            <p class="mb-4">
                Dalam sebuah event atau acara, tentu butuh hiburan yang menyenangkan. 
                Pilihan paling tepat dan efisien untuk menarik perhatian masyarakat adalah adanya hiburan yang unik dan juga menarik.
            </p>
            <p>
              <a href="#" class="btn btn-outline-primary py-2">Read more</a>
            </p>
          </div>
        </div>
    </div>
</div>

@endsection